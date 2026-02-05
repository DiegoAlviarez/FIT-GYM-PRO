<?php

namespace App\Controllers;

use App\Models\UsuarioModel; 

class Ingreso extends BaseController // El nombre de la clase DEBE ser igual al del archivo
{
    public function index()
    {
        return view('login'); 
    }

    public function validar()
    {
        $session = session();
        $model = new UsuarioModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['clave'])) {
            $session->set([
                'id' => $user['id'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('gestion'));
        }

        return redirect()->back()->with('error', 'Datos incorrectos');
    }
}