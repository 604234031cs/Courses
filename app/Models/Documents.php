<?php

namespace App\Models;

use CodeIgniter\Model;

class Documents extends Model
{
    protected $table = 'documents';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['name', 'url', 'id_subcourses', 'id_category'];
}
