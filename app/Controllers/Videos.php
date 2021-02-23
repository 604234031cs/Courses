<?php

namespace App\Controllers;

use App\Models\Listvdo;

class Videos extends BaseController
{
    public function addvideos()
    {
        $model_video = new Listvdo();
        $files = $this->request->getFileMultiple('fileupload');
        $id_courses = $this->request->getVar('id_courses');
        $id_lectures = $this->request->getVar('id_lectures');
        $count = $this->request->getVar('count');
        $url = $this->request->getVar('url');

        foreach ($files  as $file) {
            $count = $count + 1;
            $type = '.' . $file->guessExtension();
            $url_video = (string)$id_courses . '.' . (string)$id_lectures . '.' . (string)$count . $type;
            // echo "<br>" . $file->getName();
            // echo "<br>" . $file->getSize();
            // echo "<br>" . $file->guessExtension();
            // echo $type;
            $name  = str_replace($type, ' ', $file->getName(), $var);

            $datset = [
                "name" => $name,
                "url" => $url_video,
                "id_subcourses" => $id_lectures,
                "id_category" => $id_courses
            ];

            if ($model_video->insert($datset)) {
                $file->move('vdo/' . $url . '/allvdo', $url_video);
            }   // echo $name . "<br>";


        }
        return redirect()->to('/admin/' . $id_courses . '/' . $id_lectures);
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

        $model_videos->update($id_edit, $dataset);
        return redirect()->to('/admin/' . $id_courses . '/' . $id_lectures);
    }
}
