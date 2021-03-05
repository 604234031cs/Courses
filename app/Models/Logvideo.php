<?php

namespace App\Models;

use CodeIgniter\Model;

class Logvideo extends Model
{
    protected $table = 'logvdo';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['id_user', 'id_vdo', 'status', 'category', 'duration'];
}
