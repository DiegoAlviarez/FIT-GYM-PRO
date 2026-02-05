<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'administradores'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'password'];
}