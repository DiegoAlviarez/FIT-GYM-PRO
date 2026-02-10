<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PersonaModel;


class Panel extends BaseController
{
   

    // Función para el buscador con AJAX
    public function consultarPago()
    {
        $model = new PersonaModel();
        $cedula = $this->request->getPost('cedula');
        
        // Buscamos en la base de datos fitgympro
        $miembro = $model->buscarPorCedula($cedula);

        if ($miembro) {
            // Si existe devolvemos los datos al js
            return $this->response->setJSON([
                'status' => 'success',
                'nombre' => $miembro['nombre'],
                'estado' => $miembro['estado_pago'],
                'plan'   => $miembro['nombre_plan'] ?? $miembro['plan'],
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
        if(!session()->get('isLoggedIn')){
            return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesion primero');
        }
        $model = new PersonaModel();
        
        $data['socios'] = $model ->getSociosConPlanes();
        return view('gestion', $data);
    }

    //Función para guardar
public function guardar() {
        $model = new PersonaModel();

        $dataPrincipal = [
            'nombre'      => $this->request->getPost('nombre'),
            'cedula'      => $this->request->getPost('cedula'),
            'telefono'    => $this->request->getPost('telefono'),
            'plan'        => $this->request->getPost('plan'),
            'fecha_pago'  => $this->request->getPost('fecha_pago'),
            'estado_pago' => 'activo',
            'rol'         => 'socio'
        ];

        $beneficiarios = $this->request->getPost('beneficiarios');

        if ($model->registrarSocioCompleto($dataPrincipal, $beneficiarios)) {
            return redirect()->to(base_url('gestion'))->with('success', 'Registro completado');
        }
        return redirect()->back()->with('error', 'No se pudo completar el registro. Verifique los datos.');
    }

    //Elimina miembros del gym
    public function delete($id){
        $model = new PersonaModel();

        if ($model->find($id)){
            $model->delete($id);
            return redirect()->to(base_url('gestion'))->with('success', 'Socio eliminado');
        } else {
            return redirect()->to(base_url('gestion'))->with('error', 'El socio no se pudo eliminar');
        }

    }
    //Vista de edición
    public function edit($id){
        $model = new PersonaModel();

        $socio = $model->getSocioDetalle($id);        
        if (!$socio) {
            return redirect()->to(base_url('gestion'))->with('error', 'Socio no encontrado');
        }

        $data['socio'] = $socio;

        return (!empty($socio['socio_principal_id'])) 
            ? view('editar_beneficiario', $data) 
            : view('editar_principal', $data);
        
    }
    //Actualiza la información en la bdd
    public function actualizar($id){
        $model = new PersonaModel();
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
    public function instructores() {
        if(!session()->get('isLoggedIn')){
            return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesion primero');
        }
        $model = new PersonaModel();
        $data['instructores'] = $model->getInstructores();
        return view('gestion_instructores', $data);
    }
    //Registro de Instructores
    public function guardarInstructores() {
        $model = new PersonaModel();
        $data = $this->request->getPost();
        $data['rol'] = 'empleado'; // Forzamos el rol desde aquí

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Genera nombre único como 164523.jpg
            $file->move(FCPATH . 'imagenes', $newName);
            $data['foto'] = $newName; // Guardamos el nombre en el array para la BDD
        }

        if ($model->insert($data)) {
            return redirect()->to(base_url('gestion/instructores'))->with('success', 'Instructor registrado');
        }
        return redirect()->back()->with('error', 'No se pudo registrar');
    }

    //Eliminación de Instructores
    public function deleteInstructores($id){
        $model = new PersonaModel();
        if($model->find($id)){
            $model->delete($id);
            return redirect()->to(base_url('gestion/instructores'))->with('success', 'Eliminado correctamente');
        }else{
            return redirect()->to(base_url('gestion/instructores'))->with('error', 'No se pudo eliminar');
        }
    }
    //Guarda los cambios realizados en los instructores
    public function editInstructores($id){
        $model = new PersonaModel();
        $data['instructor'] = $model->find($id);

        if(!$data['instructor']){
            return redirect()->to(base_url('gestion/instructores'))->with('error', 'Instructor no encontrado');
        }

        return view('editar_instructores', $data);
    }

    //Actualiza los Instructores
    public function actualizarInstructores($id){
        $model = new PersonaModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'especialidad' => $this->request->getPost('especialidad'),
            'experiencia' => $this->request->getPost('experiencia'),
            'descripcion' => $this->request->getPost('descripcion'),
            'biografia' => $this->request->getPost('biografia'),
            'certificaciones' => $this->request->getPost('certificaciones'),
            'horario' => $this->request->getPost('horario'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'imagenes', $newName);
            $data['foto'] = $newName;

            $instructorViejo = $model->find($id);
                if (!empty($instructorViejo['foto']) && file_exists(FCPATH . 'imagenes/' . $instructorViejo['foto'])) {
                unlink(FCPATH . 'imagenes/' . $instructorViejo['foto']);
            }
        }

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('gestion/instructores'))->with('success', 'Datos actualizados correctamente');
        } else {
            return redirect()->back()->with('error', 'No se pudieron guardar los cambios');
        }
    }    

    
}