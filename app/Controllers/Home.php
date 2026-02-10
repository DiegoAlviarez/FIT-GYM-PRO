<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
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
        return view('promociones');
    }

}

