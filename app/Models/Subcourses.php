<?php

namespace App\Models;

use CodeIgniter\Model;

class Subcourses extends Model
{
    protected $table = 'subcourses';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['id_category', 'name'];
}
