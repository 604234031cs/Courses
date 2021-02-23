<?php

namespace App\Models;

use CodeIgniter\Model;

class Listvdo extends Model
{
    protected $table = 'courses_vdo';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['name', 'url', 'id_subcourses', 'id_category'];
}
