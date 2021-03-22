<?php

namespace App\Models;

use CodeIgniter\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey  = 'q_id';
    protected $allowedFields = ['q_name', 'courses_id'];
}
