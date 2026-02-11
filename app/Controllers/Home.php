<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\PromocionModel;

class Home extends BaseController
{
    public function index(): string
    {
    $personaModel = new PersonaModel();

    $data['totalActivos'] = $personaModel->where('estado_pago', 'activo')
                                         ->where('rol', 'socio')
                                         ->countAllResults();

    
    $data['totalInstructores'] = $personaModel->where('rol', 'instructor')
                                               ->countAllResults();

    return view('index', $data); // Tu vista pública
    }
    

    public function verInstalaciones(){
        return view('instalaciones');
    }

    public function verInstructores(){
        $model = new PersonaModel();

        $data['instructores'] = $model->getInstructores();

        return view('instructores', $data);

    }

    public function verPromociones(){
        $model = new PromocionModel();

        $data['promociones'] = $model->where('estado', 'activa')->findAll();

        return view('promociones', $data);
    }

}

