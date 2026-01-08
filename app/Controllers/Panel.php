<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Panel extends BaseController
{
    public function login(){
        return view('login');
    }

    public function index()
    {
        return view('gestion');
    }

    public function validar(){
        return view('gestion');
    }

    public function edit($id= null){
        
        // Datos de prueba (Esto se elimina cuando trabaje el backend)

        $data = [
        'persona' => [
            'id_persona' => $id,
            'id_titular' => $id,
            'nombre' => 'Marco Díaz',
            'email' => 'marco@gmail.com',
            'telefono' => '0412-1234567',
            'rol' => 'principal'
        ],
        'membresia' => [
            'estado' => 'Activa',
            'tipo' =>'familiar',
            'fecha_inicio' => '2025-10-20',
            'duracion' => '3 Meses'
        ],
        'beneficiarios' => [
            [
                'id_persona' => 50,
                'nombre' => 'Beneficiario 1',
                'email' => 'b1@email.com',
                'telefono' => '0414-1111111'
            ],
            [
                'id_persona' => 51,
                'nombre' => 'Beneficiario 2',
                'email' => 'b2@email.com',
                'telefono' => '0414-2222222'
            ],
            [
                'id_persona' => 52,
                'nombre' => 'Beneficiario 3',
                'email' => 'b3@email.com',
                'telefono' => '0414-3333333'
            ]
        ]
    ];
        
        return view('editar_principal', $data);
    }

    public function editBeneficiario($id=null){

        //Datos de prueba (Esto se elimina cuando trabaje el backend)
        $data = [
            'persona' => [
                'id_persona' => $id,
                'id_titular' => 1, 
                'nombre'     => 'Hijo de Juan',
                'email'      => 'hijo@email.com',
                'telefono'   => '0412-999999',
                'rol'        => 'beneficiario'
            ],
            'membresia' => [
                'estado'   => 'Activa',
                'tipo'     => 'Familiar',
                'duracion' => '1 Año'
            ]
        ];

        return view('editar_beneficiario', $data);
    }
    public function actualizar(){

        //Esto esta solo para asegurar que funciona, no hace nada solo lleva a la vista
        return view('gestion');
    }
    public function guardar(){

        //Esto esta solo para asegurar que funciona, no hace nada solo lleva a la vista
        return view('gestion');
    }
    public function instructores(){
        return view('gestion_instructores');
    }
    public function guardarInstructores(){
        return view('gestion_instructores');
    }
    public function editInstructores(){
        return view('gestion_instructores');
    }
    
}