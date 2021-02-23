<?php

namespace App\Controllers;

use App\Models\CourseCategory;
use App\Models\Listvdo;
use App\Models\Subcourses;
use App\Models\Users;

class Admin extends BaseController
{
    public function courses()
    {
        $data = [];

        $model_category = new CourseCategory();

        $data['category'] = $model_category->findAll();



        echo view('admin/templates/head');
        echo view('admin/courses', $data);
        echo view('admin/templates/footer');
        // $part = site_url()

    }

    public function subcourses($id_courses = null)
    {

        $data = [];

        $model_courses = new CourseCategory();
        if ($id_courses == null) {
            return redirect()->to('/admin/courses');
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
}
