<?php

namespace App\Models;

use CodeIgniter\Model;

class Value_question extends Model
{
    protected $table = 'select_value';
    protected $primaryKey  = 's_id';
    protected $allowedFields = ['sl_name', 'q_id', 'option_number'];
}
