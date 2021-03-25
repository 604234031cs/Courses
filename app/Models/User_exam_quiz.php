<?php

namespace App\Models;

use CodeIgniter\Model;

class User_exam_quiz extends Model
{
    protected $table = 'user_exam';
    protected $primaryKey  = 'ex_id';
    protected $allowedFields = ['courses_id', 'id_user', 'score_exam'];
}
