<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseCategory extends Model
{
    protected $table = 'courses_category';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['name', 'url', 'gc_id'];
}
