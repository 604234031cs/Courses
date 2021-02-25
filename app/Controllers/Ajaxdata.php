<?php

namespace App\Controllers;

use App\Models\CourseCategory;
use App\Models\Listvdo;
use App\Models\Logvideo;
use App\Models\Score;

class Ajaxdata extends BaseController
{
    public function videocheck()
    {
        $db = \Config\Database::connect();
        $model_logvideo = new Logvideo();

        $id_user = $this->request->getVar('id_user');
        $id_video = $this->request->getVar('id_video');
        $id_category = $this->request->getVar('id_category');

        // $id_user = 2;
        // $id_video = 4;
        // $id_category = 1;

        $check = [
            'id_user' => $id_user,
            'id_vdo' => $id_video,
            'category' => $id_category
        ];

        $data = $model_logvideo->where($check)->findAll();
        $count = count($data);
        // echo json_encode($count);
        if (!$data) {
            $insert = [
                'id_user' => $id_user,
                'id_vdo' => $id_video,
                "status" => 1,
                'category' => $id_category
            ];
            $model_logvideo->insert($insert);
            $persent = $this->calculatevideo($id_category, $id_user);
            // $updatescore = $this->updatescrore($id_category, $id_user);
            $status = [
                "status" => 200,
                "value" => "Success Insert",
                "calculate" => $persent
            ];
            echo json_encode($persent);
        }
    }

    public function calculatevideo($id_category, $id_user)
    {
        $model_video = new Listvdo();
        $model_logvideo = new Logvideo();
        $check = [
            "id_user" => $id_user,
            "category" => $id_category
        ];
        $data = $model_logvideo->where($check)->findAll();
        $countlog = count($data);
        $countList = $model_video->where('id_category', $id_category)->findAll();
        $sum =  ($countlog * 100) / count($countList);
        $this->updatescrore($sum, $id_category, $id_user);
        return number_format($sum, 2, '.', '');
    }

    public function updatescrore($sum, $id_category, $id_user)
    {
        $model_score  = new Score();
        $check = [
            "id_courses" => $id_category,
            "id_user" => $id_user
        ];
        $data = $model_score->where($check)->first();
        if ($data) {
            $id = $data['id'];
            $dataset =  [
                "id_courses" => $id_category,
                "id_user" => $id_user,
                "score" => number_format($sum, 2, '.', '')
            ];
            $model_score->update($id, $dataset);
        } else {
            $dataset =  [
                "id_courses" => $id_category,
                "id_user" => $id_user,
                "score" => number_format($sum, 2, '.', '')
            ];
            $model_score->insert($dataset);
        }
    }

    // public function search()
    // {
    //     $query = $this->request->getVar('query');
    //     $data = [];
    //     $session = session();
    //     $db = \Config\Database::connect();
    //     $model_data =  new CourseCategory();
    //     if ($query == null && $query == '') {
    //         $data['courses'] = $model_data->findAll();
    //         $id_user = $session->get('id');
    //         $query = $db->query("SELECT courses_category.id,courses_category.name,score.score
    // 	FROM courses_category
    // 	LEFT JOIN score
    // 	ON courses_category.id = score.id_courses
    // 	where score.id_user = '$id_user'");
    //         $data['courses'] = $query->getResult();
    //         $query = $this->request->getVar('query');
    //         echo json_encode($data);
    //     } else {
    //         $data['courses'] = $model_data->findAll();
    //         $id_user = $session->get('id');
    //         $query = $db->query("SELECT courses_category.id,courses_category.name,score.score
    // 	FROM courses_category
    // 	LEFT JOIN score
    // 	ON courses_category.id = score.id_courses
    //      where courses_category.name like '%$query%'
    //      and  score.id_user = '$id_user'
    //     ");
    //         $data['courses'] = $query->getResult();
    //         $query = $this->request->getVar('query');
    //         echo json_encode($data);
    //         // echo json_encode($data);
    //     }
    //     // echo json_encode($query);
    // }

    public function search()
    {
        $query = $this->request->getVar('query');
        $data = [];
        $session = session();
        $id_user = $session->get('id');
        $db = \Config\Database::connect();
        $model_courses =  new CourseCategory();
        $model_score = new Score();
        // $data['courses'] = $model_courses->findAll();
        $data['score'] = $model_score->where('id_user', $id_user)->findAll();

        if ($query == null && $query == '') {
            $data['courses'] = $model_courses->findAll();
            // $data['score'] = $model_score->where('id_user', $id_user)->findAll();
        } else {
            $query = $db->query("SELECT * FROM courses_category where name like '%$query%'");
            $data['courses'] = $query->getResult();
        }

        echo json_encode($data);
    }
}
