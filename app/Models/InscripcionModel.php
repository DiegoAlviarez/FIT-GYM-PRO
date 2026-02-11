<?php

namespace App\Models;

use CodeIgniter\Model;

class InscripcionModel extends Model
{
    protected $table            = 'inscripciones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_socio', 'id_clase', 'fecha_inscripcion'];

    /*Clases en la que se inscribe una persona*/
    public function getClasesPorSocio($id_socio)
    {
        return $this->select('inscripciones.id as id_inscripcion, clases.nombre, clases.horario, personas.nombre as instructor')
                    ->join('clases', 'clases.id = inscripciones.id_clase')
                    ->join('personas', 'personas.id = clases.id_instructor', 'left') 
                    ->where('id_socio', $id_socio)
                    ->findAll();
    }

   /* Para saber si ya está inscrito */
    public function yaEstaInscrito($id_socio, $id_clase)
    {
        return $this->where(['id_socio' => $id_socio, 'id_clase' => $id_clase])->first() !== null;
    }

    /* Método para obtener inscritos*/
    public function getInscritosPorClase($id_clase)
    {
    return $this->select('personas.nombre, personas.cedula, inscripciones.id_socio, inscripciones.fecha_inscripcion')
                ->join('personas', 'personas.id = inscripciones.id_socio')
                ->where('inscripciones.id_clase', $id_clase)
                ->findAll();
    }
  

}