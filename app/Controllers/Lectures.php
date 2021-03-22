<?php

namespace App\Controllers;

use App\Models\Subcourses;

class  Lectures extends BaseController
{


    public function addlectures()
    {
        helper(['form']);



        $model_lectures = new Subcourses();
        $id_courses = $this->request->getVar('id_courses');
        $colum = $this->request->getVar('hdnCount');

        for ($i = 0; $i <= $colum; $i++) {
            if ($this->request->getVar('name-lectures' . $i)) {
                $dataset = [
                    'id_category' => $this->request->getVar('id_courses'),
                    'name' => $this->request->getVar('name-lectures' . $i)
                ];
                $model_lectures->insert($dataset);
            }
        }
        // $dataset = [
        //     'id_category' => $this->request->getVar('id_courses'),
        //     'name' => $this->request->getVar('add-lectures')
        // ];


        return redirect()->to(base_url('/admin/lectures/' . $id_courses));
    }



    public function updatelectures()
    {
        helper(['form']);

        $model_lectures = new Subcourses();
        $id = $this->request->getVar('id_lectures');
        $id_courses = $this->request->getVar('id_courses');
        $dataset = [

            "name" => $this->request->getVar('edit-lectures')
        ];

        $model_lectures->update($id, $dataset);

        return redirect()->to(base_url('/admin/lectures/' . $id_courses));
    }
}
