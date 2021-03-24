<?php

namespace App\Controllers;

use App\Models\CourseCategory;
use App\Models\Group;
use App\Models\Listvdo;
use App\Models\Logvideo;
use App\Models\Question;
use App\Models\Score;
use App\Models\Value_question;

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
                "status" => 0,
                'category' => $id_category,
                'duration' => 0
            ];
            $model_logvideo->insert($insert);
            // $persent = $this->calculatevideo($id_category, $id_user);
            // $updatescore = $this->updatescrore($id_category, $id_user);
            // $status = [
            //     "status" => 200,
            //     "value" => "Success Insert",
            //     "calculate" => $persent
            // ];
            // echo json_encode($persent);
        }
    }

    public function duration()
    {

        $model_logvideo = new Logvideo();
        $id_user = $this->request->getVar('id_user');
        $id_video = $this->request->getVar('id_vdo');
        $duration = $this->request->getVar('duration');

        // $id_user = 2;
        // $id_video = 1;
        // $duration = 150;

        // $datacheck = [
        //     'id_user' => $id_user,
        //     'id_vdo' => $id_video
        // ];
        $update  = [
            'duration' => $duration
        ];
        $id_update = $this->getidupdate($id_user, $id_video);
        // echo $id_update[0]->id;
        if ($id_update != null && $id_update != '') {
            $model_logvideo->update((int)$id_update[0]->id, $update);
        }
    }

    public function getidupdate($user, $video)
    {
        $db = \Config\Database::connect();
        $sql = $db->query("SELECT id FROM logvdo where id_user='$user' and id_vdo = '$video' and status = 0");
        return $sql->getResult();
    }

    public function endvideo()
    {
        $id_user = $this->request->getVar('id_user');
        $id_video = $this->request->getVar('id_video');
        $id_category = $this->request->getVar('id_category');

        // $id_user = 2;
        // $id_video = 2;
        // $id_category = 1;
        // $id_category = $this->request->getVar('id_category');
        $model_logvideo = new Logvideo();

        $id_update = $this->getidupdate($id_user, $id_video);

        if ($id_update != null && $id_update != '') {
            $dataupdate  = [
                "status" => 1,
                "duration" => 0
            ];
            $model_logvideo->update((int)$id_update[0]->id, $dataupdate);
        }

        $persent = $this->calculatevideo($id_category, $id_user);


        // $status = [
        //     "status" => 200,
        //     "value" => "Success Insert",
        //     "calculate" => $persent
        // ];
        echo json_encode($persent);
        // $updatescore = $this->updatescrore($id_category, $id_user);
    }


    public function currtime()
    {
        $model_logvideo = new Logvideo();
        $db = \Config\Database::connect();
        $id_user = $this->request->getVar('id_user');
        $id_video = $this->request->getVar('id_video');
        $dataset = [
            "id_user" => $id_user,
            "id_vdo" => $id_video

        ];

        // $query = $db->query("SELECT * FROM logvdo where id_user ='$id_user' and id_vdo ='$id_video' ");
        $data['currtiem'] = $model_logvideo->where($dataset)->first();


        echo json_encode($data['currtiem']);
    }

    public function calculatevideo($id_category, $id_user)
    {
        $model_video = new Listvdo();
        $model_logvideo = new Logvideo();
        $check = [
            "id_user" => $id_user,
            "category" => $id_category,
            "status" => 1
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



    public function selact()
    {

        $key = $this->request->getVar('key');
        $data = [];
        $model_group = new Group();
        if ($key == null && $key == '') {
            $data['group'] = $model_group->findAll();
            echo json_encode($data);
        } else {
            $data['group'] = $model_group->where('c_id', $key)->findAll();
            echo json_encode($data);
        }
    }


    public function showquestion()
    {
        $key = $this->request->getVar('key');
        // $key = 2;
        $model_question = new Question();
        // $model_val_question = new Value_question();
        $data =  $model_question->where('courses_id', $key)->findAll();
        // $data['val_question'] =  $model_val_question->where('q_id',1)->findAll();
        echo json_encode($data);
    }

    public function show_val_question()
    {
        $key = $this->request->getVar('key');
        // $key = 2;
        // $model_question = new Question();
        $model_val_question = new Value_question();
        // $data =  $model_question->where('courses_id', $key)->findAll();
        $data =  $model_val_question->where('q_id', $key)->findAll();
        echo json_encode($data);
    }


    public function reanswer()
    {
        $question = $this->request->getVar('quesion');
        $answer = $this->request->getVar('answer');

        $modal_question = new Question();
        $dataset = [
            'answer' => $answer
        ];
        if ($modal_question->update($question, $dataset)) {
            $status = [
                'status' => 'success'
            ];
        } else {
            $status = [
                'status' => 'error'
            ];
        }
        echo json_encode($status);
        // 
    }

    public function delanswer($del, $q_id)
    {
        $db = \Config\Database::connect();
        $model_val_question = new Value_question();
        $query = $db->query("SELECT * FROM select_value where q_id='$q_id' and s_id='$del'");
        $data = $query->getResult();
        $model_val_question->delete($del);

        $options = $model_val_question->where('q_id', $q_id)->findAll();
        // echo $data[0]->option_number . "<br>";
        // $options = $model_val_question->where('q_id', $q_id)->findAll();

        foreach ($options as $get) {
            // echo $get['option_number'];
            if ($get['option_number'] > $data[0]->option_number) {
                // echo $get['option_number'] . "<br>";
                $op_num = $get['option_number'] - 1;
                $dataset = [
                    "option_number" => $op_num
                ];
                $model_val_question->update($get['s_id'], $dataset);
            }
        }
    }

    public function option($s_id)
    {
        $model_val_question = new Value_question();

        $data['option'] = $model_val_question->where('s_id', $s_id)->first();

        echo json_encode($data['option']);
    }
}
