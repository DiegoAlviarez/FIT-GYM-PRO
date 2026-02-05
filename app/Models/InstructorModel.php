<?php

namespace App\Models;

use CodeIgniter\Model;

class InstructorModel extends Model
{
    protected $table = 'instructores'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'especialidad', 'horario_disponibilidad', 'descripcion', 'experiencia', 'certificaciones','telefono'];
}