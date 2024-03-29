<?php

namespace App\Controllers;

use App\Models\CourseCategory;

class  Courses extends BaseController
{


    public function addcourses()
    {
        helper(['form']);

        $model_courses = new CourseCategory();

        // $colum = $model_courses->findAll();
        $file = $this->request->getFile('file_img');
        // $count = count($colum) + 1;


        // $next_folder = 'category' . $count;
        $mime = '.' . $file->guessExtension();
        $name = md5($this->request->getFile('file_img')) . $mime;

        if (isset($file) && $file != '') {
            $dataset = [
                "name" => $this->request->getVar('add-courses'),
                // "url" => $next_folder,
                "gc_id" => $this->request->getVar('group'),
                "img" =>  $name
            ];
            // if ($id = $model_courses->insert($dataset) == true) {

            $id = $model_courses->insert($dataset);
            $next_folder = 'category' . $id;
            $update = [
                'url' => $next_folder
            ];

            $model_courses->update($id, $update);

            mkdir(base_url('upload/' . $next_folder));
            mkdir(base_url('upload/' . $next_folder . '/allvdo'));
            mkdir(base_url('upload/' . $next_folder . '/alldocs'));
            $file->move(FCPATH . '/public/img/', $name);
            $status = [
                "status" => "success",
                "text" => "เพิ่มข้อมูลสำเร็จ",
                "msg" => "สำเร็จ !"
            ];
            // }
        } else {
            $dataset = [
                "name" => $this->request->getVar('add-courses'),
                // "url" => $next_folder,
                "gc_id" => $this->request->getVar('group'),
            ];
            $id = $model_courses->insert($dataset);
            $next_folder = 'category' . $id;
            $update = [
                'url' => $next_folder
            ];
            $model_courses->update($id, $update);
            // if ($model_courses->insert($dataset) == true) {
            mkdir(FCPATH . 'upload/' . $next_folder);
            mkdir(FCPATH . 'upload/' . $next_folder . '/allvdo');
            mkdir(FCPATH . 'upload/' . $next_folder . '/alldocs');
            // }
            $status = [
                "status" => "success",
                "text" => "เพิ่มข้อมูลสำเร็จ",
                "msg" => "สำเร็จ !"
            ];
        }
        session()->setFlashdata('msg', $status);
        // // echo FCPATH . '/public/imgs/', $file->getName();
        return redirect()->to(base_url('/admin/courses'));
        // echo $count;
    }



    public function updatecourses()
    {
        helper(['form']);
        $model_courses = new CourseCategory();
        $id = $this->request->getVar('edit_id');
        $file  = $this->request->getFile('_img');

        $mime = '.' . $file->guessExtension();
        $name = md5($this->request->getFile('_img')) . $mime;
        $file_default = $this->request->getVar('file_check');


        if (isset($file_default) && $file_default != '') {
            // echo "Have file default" . "<br>";
            if (isset($file) && $file != '') {
                // echo "Have File Upload";
                $dataset = [
                    "name" => $this->request->getVar('edit_name'),
                    "gc_id" => $this->request->getVar('group_e'),
                    "img" => $name
                ];
                if ($model_courses->update($id, $dataset)) {
                    unlink(FCPATH . '/public/img/' . $file_default);
                    $file->move(FCPATH . '/public/img/', $name);
                    $status = [
                        "status" => "success",
                        "text" => "อัพเดทข้อมูลสำเร็จ",
                        "msg" => "สำเร็จ !"
                    ];
                }
            } else {
                // echo "Not Have File Upload";
                $dataset = [
                    "name" => $this->request->getVar('edit_name'),
                    "gc_id" => $this->request->getVar('group_e'),
                    "img" =>  $file_default
                ];
                if ($model_courses->update($id, $dataset)) {
                    $status = [
                        "status" => "success",
                        "text" => "อัพเดทข้อมูลสำเร็จ",
                        "msg" => "สำเร็จ !"
                    ];
                }
            }
        } else {
            // echo "Not have file default<br>";
            if (isset($file) && $file != '') {
                // echo "Have File Upload Name=>" . $name;
                $dataset = [
                    "name" => $this->request->getVar('edit_name'),
                    "gc_id" => $this->request->getVar('group_e'),
                    "img" => $name
                ];
                if ($model_courses->update($id, $dataset)) {
                    $file->move(FCPATH . '/public/img/', $name);
                    $status = [
                        "status" => "success",
                        "text" => "อัพเดทข้อมูลสำเร็จ",
                        "msg" => "สำเร็จ !"
                    ];
                }
            } else {
                // echo "Not Have File Upload";
                $dataset = [
                    "name" => $this->request->getVar('edit_name'),
                    "gc_id" => $this->request->getVar('group_e'),
                ];
                if ($model_courses->update($id, $dataset)) {
                    $status = [
                        "status" => "success",
                        "text" => "อัพเดทข้อมูลสำเร็จ",
                        "msg" => "สำเร็จ !"
                    ];
                }
            }
        }

        
        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/courses'));
    }
}
