<?php

namespace App\Controllers;

use App\Models\CourseCategory;

class  Courses extends BaseController
{


    public function addcourses()
    {
        helper(['form']);

        $model_courses = new CourseCategory();

        $colum = $model_courses->findAll();

        $count = count($colum) + 1;
        $base_url = site_url('vdo/');
        $next_folder = 'category' . $count;

        $dataset = [
            "name" => $this->request->getVar('add-courses'),
            "url" => $next_folder
        ];

        if ($model_courses->insert($dataset) == true) {
            mkdir('vdo/' . $next_folder);

            mkdir('vdo/' . $next_folder . '/allvdo');
        }

        return redirect()->to('/admin/courses');
        // echo $count;
    }



    public function updatecourses()
    {
        helper(['form']);

        $model_courses = new CourseCategory();
        $id = $this->request->getVar('edit_id');

        $dataset = [
            "name" => $this->request->getVar('edit_name')
        ];

        $model_courses->update($id, $dataset);

        return redirect()->to('/admin/courses');
    }
}
