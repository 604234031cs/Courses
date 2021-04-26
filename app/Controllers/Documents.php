<?php

namespace App\Controllers;

use App\Models\CourseCategory;
use App\Models\Documents as ModelsDocuments;
use App\Models\Listvdo;



class Documents extends BaseController
{
    // public  $model_docs = new ModelsDocuments();



    public function adddocs()
    {
        helper(['form']);
        $model_docs = new ModelsDocuments();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'fileupload' => 'uploaded[fileupload]|ext_in[fileupload,csv,rar,zip,pptx,doc,xls,xlsx,docx,pdf]',

            ];

            $files = $this->request->getFileMultiple('fileupload');
            $id_courses = $this->request->getVar('id_courses');
            $id_lectures = $this->request->getVar('id_lectures');
            $count = $this->request->getVar('count');
            $url = $this->request->getVar('url');
            if ($this->validate($rules)) {
                foreach ($files  as $file) {
                    $count = $count + 1;
                    $type = '.' . $file->guessExtension();
                    $url_video = (string)$id_courses . '.' . (string)$id_lectures . '.' . (string)$count . $type;
                    $name  = str_replace($type, ' ', $file->getName(), $var);

                    $datset = [
                        "name" => $name,
                        "url" => $url_video,
                        "id_subcourses" => $id_lectures,
                        "id_category" => $id_courses,
                        "name_key" => md5($name)
                    ];

                    if ($model_docs->insert($datset)) {
                        $file->move(FCPATH . '/upload/' . $url . '/alldocs/', $url_video);
                    }   // echo $name . "<br>";
                }
                $status = [
                    "status" => "success",
                    "text" => "เพิ่มข้อมูลสำเร็จ",
                    "msg" => "สำเร็จ !"
                ];
            } else {
                $status = [
                    "status" => "error",
                    "text" => "เพิ่มข้อมูลไม่สำเร็จ",
                    "msg" => "เกิดข้อผิดพลาด !!"
                ];
            }
        }
        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/document/' . $id_courses . '/' . $id_lectures));
    }


    public function updatedocs()
    {
        helper(['form']);
        $model_docs = new ModelsDocuments();
        $model_courses = new CourseCategory();
        $edit_id_doc = $this->request->getVar('edit_doc_id');
        $doc_file = $this->request->getFile('edut_doc_file');

        $folder = $this->request->getVar('folder');

        $url_default = $this->request->getVar('doc_url_defaul');
        echo $mime = '.' . $doc_file->guessExtension();
        $name = md5($this->request->getFile('edit_doc_file')) . $mime;

        $id_courses = $this->request->getVar('id_courses');
        $id_lectures = $this->request->getVar('id_lectures');

        $colum = $this->countcolum($url_default);
        // echo $colum;

        // echo "<br>";
        $url = $id_courses . '.' . $id_lectures . '.' . $colum . $mime;
        // echo $name;
        // echo $url;
        // echo var_dump($url_default) . "<br>";
        if (isset($doc_file) && $doc_file != '') {

            $dataset = [
                'name' => $this->request->getVar('edit_doc_name'),
                'url' => $url,
                'name_key' => $name
            ];
            if ($model_docs->update($edit_id_doc, $dataset)) {
                $path = FCPATH . '/upload/' . $folder . '/alldocs/' . $url_default;
                unlink($path);
                $doc_file->move(FCPATH . '/upload/' . $folder . '/alldocs/', $url);
                $status = [
                    "status" => "success",
                    "text" => "แก้ไขข้อมูลสำเร็จ",
                    "msg" => "สำเร็จ !"
                ];
            }
        } else {
            $dataset = [
                'name' => $this->request->getVar('edit_doc_name'),
            ];
            if ($model_docs->update($edit_id_doc, $dataset)) {
                $status = [
                    "status" => "success",
                    "text" => "แก้ไขข้อมูลสำเร็จ",
                    "msg" => "สำเร็จ !"
                ];
            }
        }

        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/document/' . $id_courses . '/' . $id_lectures));
    }

    public function countcolum($url)
    {
        $model_docs = new ModelsDocuments();
        $docs = $model_docs->findAll();
        $i = 1;
        foreach ($docs as $doc) {
            if ($url == $doc['url']) {

                break;
            } else {
                $i += 1;
            }
        }
        return $i;
    }
}
