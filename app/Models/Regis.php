<?php

namespace App\Models;

use CodeIgniter\Model;

class Regis extends Model
{
    protected $table = 'register';
    protected $primaryKey  = 'id';
    protected $allowedFields = ['r_name', 'r_lastname', 'r_username', 'r_password'];
}
