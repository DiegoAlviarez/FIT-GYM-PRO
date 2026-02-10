<?php

namespace App\Models;
use CodeIgniter\Model;

class PromocionModel extends Model {
    
    protected $table = 'promociones';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'titulo', 'subtitulo', 'icono', 'color_clase', 
        'precio_actual', 'precio_anterior', 'ahorro', 'validez', 'estado'
    ];
}