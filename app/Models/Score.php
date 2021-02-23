<?php

namespace App\Models;

use CodeIgniter\Model;

class Score extends Model
{
    protected $table = 'score';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['id_courses', 'id_user', 'score'];
}
