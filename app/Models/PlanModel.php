<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model
{
    
    protected $table      = 'planes'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_plan', 'descripcion', 'precio', 'duracion_dias'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}