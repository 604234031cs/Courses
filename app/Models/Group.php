<?php

namespace App\Models;

use CodeIgniter\Model;

class Group extends Model
{
    protected $table = 'group_courses';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['name', 'c_id'];
}
