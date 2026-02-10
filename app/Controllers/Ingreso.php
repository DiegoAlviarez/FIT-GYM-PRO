<?php

namespace App\Controllers;

use App\Models\PersonaModel; 

class Ingreso extends BaseController // 
{
    public function index()
    {
        return view('login'); 
    }

    public function validar()
    {
        $session = session();
        $model = new PersonaModel();
        
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();
        
    
        if ($user && password_verify($password, $user['clave'])) {
            $session->set([
                'id' => $user['id'],
                'rol' => $user['rol'],
                'isLoggedIn' => true
            ]);
            if ($user['rol'] === 'administrador'){
                return redirect()->to(base_url('gestion/instructores'));
            } else{
                return redirect()->to(base_url('gestion'));
            }
        }

        return redirect()->back()->with('error', 'Datos incorrectos');
    }

    public function salir(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}