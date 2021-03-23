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
                    echo $j . $answer . "<br>";
                    echo "Option True";
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
    }
}
