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

        $next_folder = 'category' . $count;

        $dataset = [
            "name" => $this->request->getVar('add-courses'),
            "url" => $next_folder,
            "gc_id" => $this->request->getVar('group')
        ];

        if ($model_courses->insert($dataset) == true) {
            mkdir('upload/' . $next_folder);
            mkdir('upload/' . $next_folder . '/allvdo');
            mkdir('upload/' . $next_folder . '/alldocs');
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
