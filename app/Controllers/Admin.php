<?php

namespace App\Controllers;

use App\Models\CategoryGroup;
use App\Models\CourseCategory;
use App\Models\Documents;
use App\Models\Group;
use App\Models\Listvdo;
use App\Models\Question;
use App\Models\Regis;
use App\Models\Subcourses;
use App\Models\Users;
use App\Models\Value_question;

class Admin extends BaseController
{
    public function courses()
    {
        $data = [];
        $db = \Config\Database::connect();
        $query = $db->query('SELECT courses_category.id,courses_category.name ,courses_category.url,courses_category.img,
        category.id as ca_id,category.name as ca_name,group_courses.name as gr_name,group_courses.id as gr_id
        FROM courses_category,category,group_courses 
        WHERE category.id = group_courses.c_id
        and courses_category.gc_id = group_courses.id');


        // $model_category = new CourseCategory();
        $model_mainc = new CategoryGroup();

        $data['category'] = $query->getResult('array');
        // echo json_encode($data);
        $data['main_c'] = $model_mainc->findAll();
        echo view('admin/templates/head');
        echo view('admin/courses', $data);
        echo view('admin/templates/footer');
        // $part = site_url()
    }

    public function category()
    {
        $data = [];
        $model_mainc = new CategoryGroup();
        $data['main'] = $model_mainc->findAll();
        echo view('admin/templates/head');
        echo view('admin/category', $data);
        echo view('admin/templates/footer');
    }

    public function group_courses($id = null)
    {
        $data = [];
        $model_mainc = new CategoryGroup();
        $data['mains'] = $model_mainc->findAll();
        $data['name'] = $model_mainc->where('id', $id)->first();
        $model_group  = new Group();
        $data['group'] = $model_group->where('c_id', $id)->findAll();



        echo view('admin/templates/head');
        echo view('admin/group', $data);
        echo view('admin/templates/footer');
    }

    public function subcourses($id_courses = null)
    {

        $data = [];

        $model_courses = new CourseCategory();
        if ($id_courses == null) {
            return redirect()->to(base_url('/admin/courses'));
        }

        $model_subcourses = new Subcourses();
        $data['subcourses'] = $model_subcourses->where('id_category', $id_courses)->findAll();
        $data['courses'] = $model_courses->where('id', $id_courses)->first();

        echo view('admin/templates/head');
        echo view('admin/lectures', $data);
        echo view('admin/templates/footer');
    }


    public function videos($id_courses = null, $id_lectures = null)
    {

        $data = [];
        // echo $id_courses;
        // echo $id_lectures;

        $model_video = new Listvdo();
        $model_courses = new CourseCategory();
        $model_lectures = new Subcourses();



        $qurery = [
            'id_subcourses' => $id_lectures,
            'id_category' => $id_courses
        ];
        // echo json_encode($qurery);
        // echo  $model_video->where($qurery)->findAll();
        $data['courses'] = $model_courses->where('id', $id_courses)->first();
        $data['lectures'] = $model_lectures->where('id', $id_lectures)->first();
        $data['videos'] = $model_video->where($qurery)->findAll();
        $data['count'] = count($data['videos']);
        // // echo json_encode($data);

        echo view('admin/templates/head');
        echo view('admin/showvideo', $data);
        echo view('admin/templates/footer');
    }


    public function documents($id_courses = null, $id_lectures = null)
    {
        $data = [];
        $model_courses = new CourseCategory();
        $model_lectures = new Subcourses();
        $model_doc = new Documents();

        $dataset = [
            'id_category' => $id_courses,
            'id_subcourses' => $id_lectures
        ];

        $data['docs'] = $model_doc->where($dataset)->findAll();

        $data['courses'] = $model_courses->where('id', $id_courses)->first();
        $data['lectures'] = $model_lectures->where('id', $id_lectures)->first();
        $data['count'] = count($data['docs']);

        // echo json_encode($data);

        echo view('admin/templates/head');
        echo view('admin/documents', $data);
        echo view('admin/templates/footer');
        // echo WRITEPATH .'upload';
    }


    public function list_regis()
    {
        $model_regis = new Regis();
        $data['list_regis'] = $model_regis->findAll();
        echo view('admin/templates/head');
        echo view('admin/register', $data);
        echo view('admin/templates/footer');
    }


    public function approve($id_regis = null, $status = null)
    {
        $model_regis = new Regis();
        $model_user = new Users();
        if ($status != null && $id_regis != null) {
            if ($status == 1) {
                $regis = $model_regis->find($id_regis);
                $dataset = [
                    "name" => $regis['r_name'],
                    "lastname" => $regis['r_lastname'],
                    "username" => $regis['r_username'],
                    "password" => $regis['r_password'],
                    "status" => 1
                ];
                if ($model_user->insert($dataset)) {
                    $model_regis->delete($id_regis);

                    return redirect()->to(base_url('/admin/register'));
                }
            } else {
                $model_regis->delete($id_regis);
                return redirect()->to(base_url('/admin/register'));
            }
        }
    }


    function question($id = null)
    {
        $model_question = new Question();
        // $model_val_question = new Value_question();
        $data['question'] =  $model_question->where('courses_id', $id)->findAll();
        $data['id'] = $id;

        echo view("admin/templates/head");
        echo view("admin/question", $data);
        echo view("admin/templates/footer");
    }

    function val_question($id = null)
    {
        $model_question = new Question();
        $model_val_question = new Value_question();
        $data['question'] =  $model_question->where('q_id', $id)->first();
        $data['val_question'] = $model_val_question->where('q_id', $id)->findAll();

        echo view("admin/templates/head");
        echo view("admin/val_question", $data);
        echo view("admin/templates/footer");
    }
}
