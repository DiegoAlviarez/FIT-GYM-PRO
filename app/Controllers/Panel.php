<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MiembroModel;
use App\Models\InstructorModel; 

class Panel extends BaseController
{
   

    // Función para el buscador con AJAX
    public function consultarPago()
    {
        $model = new MiembroModel();
        $cedula = $this->request->getPost('cedula');
        
        // Buscamos en la base de datos fitgympro
        $miembro = $model->where('cedula', $cedula)->first();

        if ($miembro) {
            // Si existe devolvemos los datos al js
            return $this->response->setJSON([
                'status' => 'success',
                'nombre' => $miembro['nombre'],
                'estado' => $miembro['estado_pago'],
                'plan'   => $miembro['plan'],
                'fecha'  => $miembro['fecha_pago'],
                'telefono' => $miembro['telefono']
            ]);
        } else {
            // Si no existe avisamos al JS
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => 'Cédula no registrada en el sistema.'
            ]);
        }
    }
    //Carga la lista de socios y calcula el estado de pago
    public function socios(){
        $model = new MiembroModel();
        //Recupera los registros
        $sociosRaw = $model->select('miembros.*, planes.nombre_plan')->join('planes', 'planes.id = miembros.plan', 'left') ->findAll();
        //Fecha actual
        $hoy = new \DateTime();
        
        //Validación de membresía
        foreach ($sociosRaw as &$socio){
            if (!empty($socio['fecha_pago'])) {
                $fechaPago = new \DateTime($socio['fecha_pago']);

                $intervalo = $fechaPago->diff($hoy);
                $diasTranscurridos = $intervalo->days;

                //Actualización del estado
                if($diasTranscurridos > 30){
                    $socio['estado_pago'] = 'Pendiente';
                }else{
                    $socio['estado_pago'] = 'Al día';
                }
            }
        }
        $data['socios'] = $sociosRaw;
        return view('gestion', $data);
    }

    //Función para guardar
    public function guardar(){
        $model = new MiembroModel();

        //Estructura de datos
        $dataPrincipal = [
            'nombre' => $this->request->getPost('nombre'),
            'cedula' => $this->request->getPost('cedula'),
            'telefono' => $this->request->getPost('telefono'),
            'plan' => $this->request->getPost('plan'),
            'fecha_pago' => $this->request->getPost('fecha_pago'),
            'estado_pago' => 'Al día',
            'socio_principal_id' => null
        ];
        $model->insert($dataPrincipal);
        //Id para guardar los beneficiarios
        $principalId = $model->insertID();

        $beneficiariosPost = $this->request->getPost('beneficiarios');

        if (!empty($beneficiariosPost['nombre'])) {
        foreach($beneficiariosPost['nombre'] as $key => $nombreBnf) {
            if(!empty($nombreBnf)) {
                $model->insert([
                    'nombre' => $nombreBnf,
                    'cedula' => $beneficiariosPost['cedula'][$key],
                    'telefono' => $beneficiariosPost['telefono'][$key],
                    'plan' => 'Beneficiario', // Identificador de rol
                    'fecha_pago' => $this->request->getPost('fecha_pago'), 
                    'estado_pago' => 'Al día',
                    'socio_principal_id' => $principalId 
                ]);
            }
        }
    }
    return redirect()->to(base_url('gestion'))->with('success', 'Registro completado');
    }

    //Elimina miembros del gym
    public function delete($id){
        $model = new MiembroModel();

        if ($model->find($id)){
            $model->delete($id);
            return redirect()->to(base_url('gestion'))->with('success', 'Socio eliminado');
        } else {
            return redirect()->to(base_url('gestion'))->with('error', 'El socio no se pudo eliminar');
        }

    }
    //Vista de edición
    public function edit($id){
        $model = new MiembroModel();

        $socio = $model->select('miembros.*, planes.nombre_plan')->join('planes', 'planes.id = miembros.plan', 'left')->where('miembros.id', $id)->first();
        
        $data['socio'] = $socio;
        //Vista de edición según principal o beneficiario
        if (!empty($socio['socio_principal_id'])){
            return view('editar_beneficiario', $data);
        }else{
            return view('editar_principal', $data);
        }
        
    }
    //Actualiza la información en la bdd
    public function actualizar($id){
        $model = new MiembroModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'cedula' => $this->request->getPost('cedula'),
            'telefono' => $this->request->getPost('telefono'),
            'plan' => $this->request->getPost('id_plan'),
            'fecha_pago' => $this->request->getPost('fecha_pago'),
        ];

        $data = array_filter($data);

        if($model->update($id, $data)){
            return redirect()->to(base_url('gestion'))->with('success', 'Datos actualizados');
        }else{
            return redirect()->back()->with('error', 'No se pudieron guardar los cambios');

        }
    }

    //Listado de instructores
    public function instructores(){
        $model = new InstructorModel();
        $data ['instructores'] = $model->findAll();
        return view('gestion_instructores', $data);
    }
    //Registro de Instructores
    public function guardarInstructores(){
        $model = new InstructorModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'especialidad' => $this->request->getPost('especialidad'),
            'horario_disponibilidad' => $this->request->getPost('horario_disponibilidad'),
            'experiencia' => $this->request->getPost('experiencia'),
            'descripcion' => $this->request->getPost('descripcion'),
            'certificaciones' => $this->request->getPost('certificaciones'),
            'telefono' => $this->request->getPost('telefono')
        ];
        if ($model->insert($data)){
            return redirect()->to(base_url('gestion/instructores'))->with('success', 'Instructor registrado correctamente');
        }else{
            return redirect()->back()->with('error', 'No se pudo registrar al instructor');
        }
    }
    //Eliminación de Instructores
    public function deleteInstructores($id){
        $model = new InstructorModel();
        if($model->find($id)){
            $model->delete($id);
            return redirect()->to(base_url('gestion/instructores'))->with('success', 'Eliminado correctamente');
        }else{
            return redirect()->to(base_url('gestion/instructores'))->with('error', 'No se pudo eliminar');
        }
    }
    //Guarda los cambios realizados en los instructores
    public function editInstructores($id){
        $model = new InstructorModel();
        $data['instructor'] = $model->find($id);

        if(!$data['instructor']){
            return redirect()->to(base_url('gestion/instructores'))->with('error', 'Instructor no encontrado');
        }

        return view('editar_instructores', $data);
    }

    //Actualiza los Instructores
    public function actualizarInstructores($id){
        $model = new InstructorModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'especialidad' => $this->request->getPost('especialidad'),
            'experiencia' => $this->request->getPost('experiencia'),
            'descripcion' => $this->request->getPost('descripcion'),
            'certificaciones' => $this->request->getPost('certificaciones'),
            'horario_disponibilidad' => $this->request->getPost('horario_disponibilidad'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        if ($model->update($id, $data)) {
            return redirect()->to(base_url('gestion/instructores'))->with('success', 'Datos actualizados correctamente');
        } else {
            return redirect()->back()->with('error', 'No se pudieron guardar los cambios');
        }
    }

    
}