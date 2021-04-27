<?php

namespace App\Controllers;

use App\Models\Listvdo;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




class Videos extends BaseController
{



    public function addvideos()
    {

        $files = $this->request->getFileMultiple('fileupload');
        $name = 'test.csv';
        helper(['form']);
        $model_video = new Listvdo();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'fileupload' => 'uploaded[fileupload]|ext_in[fileupload,csv]',
            ];
            $file = $this->request->getFile('fileupload');
            $id_courses = $this->request->getVar('id_courses');
            $id_lectures = $this->request->getVar('id_lectures');
            // $count = $this->request->getVar('count');
            // $url = $this->request->getVar('url');

            if ($this->validate($rules)) {
                $filename = $file->getName();
                if ($file->move(FCPATH . '/upload/', $filename)) {
                    $openfile = fopen(FCPATH . '/upload/' . $filename, "r");
                    $i = 0;
                    $numberOfFields = 2;
                    $importData_arr = array();
                    while (($filedata = fgetcsv($openfile, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        // Skip first row & check number of fields
                        // echo $i . "<>" . $num . "<>" . $numberOfFields . "<br>";
                        if ($i > 0 && $num == $numberOfFields) {
                            // Key names are the insert table field names - name, email, city, and status
                            $importData_arr[$i]['name'] = $filedata[0];
                            $importData_arr[$i]['key'] = $filedata[1];
                        }
                        $i++;
                    }
                    fclose($openfile);
                    unlink(FCPATH . '/upload/'. $filename);
                    // if ($importData_arr != []) {
                    if ($importData_arr != []) {
                        $count_array = count($importData_arr);
                        for ($i = 1; $i <= $count_array; $i++) {
                            $datset = [
                                "name" => $importData_arr[$i]['name'],
                                "url" => null,
                                "id_subcourses" => $id_lectures,
                                "id_category" => $id_courses,
                                "name_key" => $importData_arr[$i]['key']
                            ];
                            $model_video->insert($datset);
                        }
                        $status = [
                            "status" => "success",
                            "text" => "เพิ่มข้อมูลสำเร็จ",
                            "msg" => "สำเร็จ !"
                        ];
                        session()->setFlashdata('msg', $status);
                        return redirect()->to(base_url('/admin/' . $id_courses . '/' . $id_lectures));
                    }

                    // } else {

                    // }
                }
                // echo json_encode($importData_arr)
                // foreach ($files  as $file) {
                //     $count = $count + 1;
                //     $type = '.' . $file->guessExtension();
                //     $url_video = (string)$id_courses . '.' . (string)$id_lectures . '.' . (string)$count . $type;
                //     $name  = str_replace($type, ' ', $file->getName(), $var);

                //     $datset = [
                //         "name" => $name,
                //         "url" => $url_video,
                //         "id_subcourses" => $id_lectures,
                //         "id_category" => $id_courses,
                //         "name_key" => md5($name)
                //     ];
                //     if ($model_video->insert($datset)) {
                //         $file->move(FCPATH . '/upload/' . $url . '/allvdo/', $url_video);
                //     }
                // }
                // $status = [
                //     "status" => "success",
                //     "text" => "เพิ่มข้อมูลสำเร็จ",
                //     "msg" => "สำเร็จ !"
                // ];
            } else {
                //     $status = [
                //         "status" => "error",
                //         "text" => "เพิ่มข้อมูลไม่สำเร็จ",
                //         "msg" => "เกิดข้อผิดพลาด !!"
                //     ];
            }
        }
    }


    public function insertdata($arr, $id_c, $id_l)
    {
        // echo json_encode($arr);
        $model_video = new Listvdo();
        // echo count($arr);
        $count_array = count($arr);
        for ($i = 1; $i <= $count_array; $i++) {
            $datset = [
                "name" => $arr[$i]['name'],
                "url" => null,
                "id_subcourses" => $id_l,
                "id_category" => $id_c,
                "name_key" => $arr[$i]['key']
            ];
            $model_video->insert($datset);
        }

        $status = [
            "status" => "success",
            "text" => "เพิ่มข้อมูลสำเร็จ",
            "msg" => "สำเร็จ !"
        ];

        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/' . $id_c . '/' . $id_l));
    }


    public function updatevideo()
    {
        helper(['form']);

        $model_videos = new Listvdo();
        $id_edit = $this->request->getVar('edit-id');
        $video_name = $this->request->getVar('edit-video');
        $id_courses = $this->request->getVar('id_courses');
        $id_lectures = $this->request->getVar('id_lectures');
        $dataset = [
            "name" => $video_name
        ];

        if ($model_videos->update($id_edit, $dataset)) {
            $status = [
                "status" => "success",
                "text" => "แก้ไขข้อมูลสำเร็จ",
                "msg" => "สำเร็จ !"
            ];
        } else {
            $status = [
                "status" => "error",
                "text" => "แก้ไขข้อมูลไม่สำเร็จ",
                "msg" => "เกิดข้อผิดพลาด !!"
            ];
        }



        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/' . $id_courses . '/' . $id_lectures));
    }
}
