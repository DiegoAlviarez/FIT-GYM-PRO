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

        $reglas = ['email' => [ 'rules' => 'required|valid_email|max_length[50]',
                                'errors' => [ 'required' => 'El correo es obligatorio',
                                'valid_email' => 'Debe ingresar un correo válido',
                                'max_length' => 'El correo es demasiado largo']
                                ],
                    'password' => [ 'rules' => 'required|max_length[20]',
                                    'errors' => [ 'required' => 'La contraseña es obligatoria',
                                    'max_length' => 'La contraseña es demasiado larga']
                                    ]
        ];
                                 


        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', 'El correo o la clave son inválidos o demasiado largos.');
        }

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
            } elseif ($user['rol'] === 'empleado'){
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