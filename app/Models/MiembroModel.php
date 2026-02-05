<?php

namespace App\Models;

use CodeIgniter\Model;

class MiembroModel extends Model
{
    protected $table      = 'miembros';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cedula', 'nombre', 'telefono', 'fecha_pago', 'estado_pago', 'plan', 'socio_principal_id'];
}