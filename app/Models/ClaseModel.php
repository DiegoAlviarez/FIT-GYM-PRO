<?php

namespace App\Models;

use CodeIgniter\Model;

class ClaseModel extends Model
{
    protected $table      = 'clases';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'horario', 'cupos_max', 'id_instructor'];

   
    public function getClasesConInstructor()
    {
        return $this->select('clases.*, personas.nombre as nombre_instructor')
                    ->join('personas', 'personas.id = clases.id_instructor')
                    ->findAll();
    }
}