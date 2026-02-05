<?php

namespace App\Controllers;

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
        return view('instructores');
    }

    public function verPromociones(){
        return view('promociones');
    }

}

