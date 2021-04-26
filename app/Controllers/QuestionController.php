<?php

namespace App\Controllers;

use App\Models\Value_question;
use App\Models\Question;


class QuestionController extends BaseController
{



    public function addquestion()
    {
        helper(['form']);

        $question_title =  $this->request->getVar('question-add');
        $answer =  $this->request->getVar('answer_value');
        $id_courses = $this->request->getVar('id_courses');
        $row = $this->request->getVar('rows');
        $modal_question = new Question();
        $modal_option = new Value_question();

        $question_add = [
            'q_name' => $question_title,
            'courses_id' => $id_courses
        ];
        $id_question = $modal_question->insert($question_add);



        $j = 1;
        for ($i = 1; $i <= $row; $i++) {
            $option_title =  $this->request->getVar('option_value' . $i);
            if ($this->request->getVar('option_value' . $i) != "") {
                if ($i == $answer) {
                    $dataupdate = [
                        "q_name" => $question_title,
                        "answer" => $j
                    ];

                    $modal_question->update($id_question, $dataupdate);
                    // echo $j . $answer . "<br>";
                    // echo "Option True";
                }
                $datainsert = [
                    'sl_name' => $option_title,
                    'q_id' => $id_question,
                    'option_number' => $j
                ];
                $modal_option->insert($datainsert);

                $j++;
            }
            // echo $this->request->getVar('option_value' . $i) . "<br>";
        }

        $status = [
            "status" => "success",
            "text" => "เพิ่มข้อมูลสำเร็จ",
            "msg" => "สำเร็จ !"
        ];
        session()->setFlashdata('msg', $status);
        return  redirect()->to(base_url('/admin/question/' . $id_courses));
    }

    public function editquestion()
    {
        helper(['form']);
        $modal_question  =  new Question();
        $id_question = $this->request->getVar('question_id');
        $name_question = $this->request->getVar('question_name');
        $courses_id  = $this->request->getVar('courses_id');

        $update_set =  [
            'q_name' => $name_question
        ];

        if ($modal_question->update($id_question, $update_set)) {
            $status = [
                "status" => "success",
                "text" => "แก้ไขข้อมูลสำเร็จ",
                "msg" => "สำเร็จ !"
            ];
        }
        session()->setFlashdata('msg', $status);
        return  redirect()->to(base_url('/admin/question/' . $courses_id));
    }



    public function editoption()
    {

        helper(['form']);

        $s_id = $this->request->getVar('s_id');
        $option_title = $this->request->getVar('option_title');
        $s_courses = $this->request->getVar('s_courses');
        $modal_option = new Value_question();

        $dataset = [
            'sl_name' => $option_title
        ];
        if ($modal_option->update($s_id, $dataset)) {
            $status = [
                "status" => "success",
                "text" => "แก้ไขข้อมูลสำเร็จ",
                "msg" => "สำเร็จ !"
            ];
        }

        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/question/' . $s_courses));
    }

    public function afteroption()
    {
        helper(['form']);
        $select_value_model = new Value_question();

        $row2 =  $this->request->getVar('rows2');
        $q_id = $this->request->getVar('q_id');
        $courses_id = $this->request->getVar('course_id');

        $count_option =  count($select_value_model->where('q_id', $q_id)->findAll());

        for ($i = 1; $i <= $row2; $i++) {
            if ($this->request->getVar('option_value' . $i) != null) {
                $count_option++;
                $option_set = [
                    'sl_name' => $this->request->getVar('option_value' . $i),
                    'q_id' => $q_id,
                    'option_number' => $count_option
                ];
                // echo json_encode($option_set);
                $select_value_model->insert($option_set);
            }

            // $option_title2 =  $this->request->getVar('option_value' . $i) . "<br>";
        }
        $status = [
            "status" => "success",
            "text" => "เพิ่มข้อมูลสำเร็จ",
            "msg" => "สำเร็จ !"
        ];

        
        session()->setFlashdata('msg', $status);
        return redirect()->to(base_url('/admin/question/' . $courses_id));
    }
}
