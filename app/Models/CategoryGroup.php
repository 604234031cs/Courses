<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryGroup extends Model
{
    protected $table = 'category';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['name'];
}
