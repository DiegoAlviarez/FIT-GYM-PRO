<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Panel extends BaseController
{
    public function login(){
        return view('login');
    }

    public function socios()
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
                'id' => $id,
                'nombres' => 'Marco Alejandro',
                'apellidos' => 'Garcia López',
                'ci' => 'V12345678',
                'email' => 'marco@gmail.com',
                'telefono' => '0412-1234567',       
            ],
            'beneficiarios' => [
                0 => [
                    'id' => 50,
                    'nombres' => 'Juanito',
                    'apellidos' => 'Díaz',
                    'email' => 'b1@email.com',
                    'telefono' => '0414-1111111'
                ],
                1 => [
                    'id' => 51,
                    'nombres' => 'Juanito',
                    'apellidos' => 'Díaz',
                    'email' => 'b2@email.com',
                    'telefono' => '0414-2222222'
                ],
                2 => [
                    'id' => 52,
                    'nombres' => 'Juanito',
                    'apellidos' => 'Díaz',
                    'email' => 'b3@email.com',
                    'telefono' => '0414-3333333'
                ]
            ],
            'membresia' => [
                    'estado_actual' => 'activo',
                    'id_plan' => 6,
                    'fecha_inicio' => '2025-10-20',
                    'fecha_fin' => '2026-01-20'
                ]
        ];
        
        return view('editar_principal', $data);
    }
    public function delete($id=null){
        return view('gestion');
    }

    public function editBeneficiario($id=null){

        //Datos de prueba (Esto se elimina cuando trabaje el backend)
        $data = [
            'persona' => [
                'id' => $id,
                'nombres'    => 'Juanito Junior',
                'apellidos'  => 'Díaz Pérez',
                'ci'         => 'V-31222333',
                'email'      => 'hijo@email.com',
                'telefono'   => '0412-999999',
            ],
            'membresia' => [
                'estado' => 'activo',
                'fecha_inicio' => '2025-10-20',
                'fecha_fin' => '2026-01-20'
            ],
            'plan' => [
                'nombre' => 'Plan Familiar (4 personas)'
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
        //Esto esta solo para asegurar que funciona, no hace nada solo lleva a la vista
        return view('gestion_instructores');
    }
    public function guardarInstructores(){
         //Esto esta solo para asegurar que funciona, no hace nada solo lleva a la vista
        return view('gestion_instructores');
    }
    public function editInstructores($id=null){
        
        //Datos de prueba (Esto se elimina cuando trabaje el backend)
        $data = [
            'instructor' => [
                'id' => $id,
                'nombres' => 'Hijo de Juan',
                'apellidos'  => 'hdfsdsfds',
                'especialidad' => 'fdsgfdsg',
                'horario_disponibilidad' => 'bdfsdffsdf',
                'numero_telefonico' => '783284234',
                'foto' => 'imagen1.png'
            ],
        ];
        return view('editar_instructores', $data);
    }
    public function actualizarInstructores(){
        return view('editar_instructores');
    }
    public function deleteInstructores(){
        return view('gestion_instructores');
    }
    
}