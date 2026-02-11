<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{
    protected $table = 'personas'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['cedula','nombre', 'telefono', 'email', 'fecha_pago', 'estado_pago', 'plan', 'socio_principal_id', 'rol', 'clave', 'especialidad', 'horario', 'descripcion', 'biografia', 'experiencia', 'certificaciones', 'foto' ];


    public function getSociosConPlanes()
        {
            $socios = $this->select('personas.*, planes.nombre_plan')
                       ->join('planes', 'planes.id = personas.plan', 'left')
                       ->whereIn('personas.rol', ['socio', 'beneficiario'])
                       ->findAll();

            $hoy = new \DateTime();

            foreach ($socios as &$socio) {
                if (!empty($socio['fecha_pago'])) {
                    $fechaPago = new \DateTime($socio['fecha_pago']);
                    $intervalo = $fechaPago->diff($hoy);
                
                    // Lógica de negocio: Más de 30 días = Pendiente
                    $socio['estado_pago'] = ($intervalo->days > 30) ? 'vencido' : 'activo';
                }
            }

            return $socios;
        }

    /**
     * Obtiene un socio específico con su plan
     */
    public function getSocioDetalle($id)
    {
        return $this->select('personas.*, planes.nombre_plan')
                    ->join('planes', 'planes.id = personas.plan', 'left')
                    ->where('personas.id', $id)
                    ->first();
    }

public function registrarSocioCompleto($dataPrincipal, $beneficiariosPost)
{
    $db = \Config\Database::connect();
    $db->transStart(); 

    // 1. Insertar Principal
    $this->insert($dataPrincipal);
    $principalId = $this->insertID();

    // 2. Insertar Beneficiarios
    if (!empty($beneficiariosPost['nombre'])) {
        foreach ($beneficiariosPost['nombre'] as $key => $nombreBnf) {
            if (!empty(trim($nombreBnf))) {
                $datosBnf = [
                    'nombre'             => trim($nombreBnf),
                    'cedula'             => $beneficiariosPost['cedula'][$key] ?: null,
                    'telefono'           => $beneficiariosPost['telefono'][$key] ?: null,
                    'plan'               => $dataPrincipal['plan'], 
                    'fecha_pago'         => $dataPrincipal['fecha_pago'], 
                    'estado_pago'        => 'activo',
                    'socio_principal_id' => $principalId,
                    'rol'                => 'socio'
                ];

                $this->insert($datosBnf);
            }
        }
    }

    $db->transComplete(); 
    return $db->transStatus(); 
}

    /**
     * Obtiene solo los instructores (rol empleado/administrador con especialidad)
     */
    public function getInstructores()
    {
        // Ajusta el 'rol' según como se guarde
        return $this->where('rol', 'instructor')
                    ->findAll();
    }
    
    public function buscarPorCedula($cedula)
{
    return $this->select('personas.*, planes.nombre_plan')
                ->join('planes', 'planes.id = personas.plan', 'left')
                ->where('personas.cedula', $cedula)
                ->first();
}
    

}