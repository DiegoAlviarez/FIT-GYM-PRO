<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClaseModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PersonaModel;
use App\Models\PromocionModel;
use App\Models\InscripcionModel;

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
                'id' => $miembro['id'],
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
    public function Instructores() {
        if(!session()->get('isLoggedIn')){
            return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesion primero');
        }
        $model = new PersonaModel();
        $data['instructores'] = $model->where('rol', 'instructor')->findAll();
        return view('gestion_instructores', $data);
    }

    //Registro de Instructores
    public function guardarInstructores() {
        $model = new PersonaModel();
        $data = $this->request->getPost();
        $data['rol'] = 'instructor'; //

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
    
    public function gestionPromociones() {
        if(!session()->get('isLoggedIn')){
            return redirect()->to(base_url('login'))->with('error', 'Inicia sesión');
        }

        $model = new PromocionModel();
        
        $data['promociones'] = $model->orderBy('created_at', 'DESC')->findAll();

        return view('gestion_promociones', $data);
    }   

    public function guardarPromocion() {
        $model = new PromocionModel();
    
        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'subtitulo' => $this->request->getPost('subtitulo'),
            'precio_actual' => $this->request->getPost('precio_actual'),
            'precio_anterior' => $this->request->getPost('precio_anterior'),
            'icono' => $this->request->getPost('icono'),
            'color_clase'=> $this->request->getPost('color_clase'),
            'ahorro' => $this->request->getPost('ahorro'),
            'validez' => $this->request->getPost('validez'),
            'estado' => 'activa'
        ];

        if ($model->insert($data)) {
            return redirect()->to(base_url('promociones/nuevo'))->with('success', 'Promoción Registrada');
        } else {
            return redirect()->back()->with('error', 'Ocurrió un error al guardar.');
        }
    }
    public function eliminarPromocion($id) {
        $model = new PromocionModel();
    
        
        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to(base_url('promociones/nuevo'))->with('success', 'Promoción eliminada');
        } else {
            return redirect()->to(base_url('promociones/nuevo'))->with('error', 'Error al eliminar');
        }
    }

    public function editarPromocion($id) {
        $model = new PromocionModel();
        $data['promocion'] = $model->find($id);

        if (!$data['promocion']) {
            return redirect()->to(base_url('promociones/nuevo'))->with('error', 'Promoción no encontrada');
        }

        return view('editar_promociones', $data);
    }

    public function actualizarPromocion($id) {
        $model = new PromocionModel();
    
        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'subtitulo' => $this->request->getPost('subtitulo'),
            'precio_actual' => $this->request->getPost('precio_actual'),
            'precio_anterior' => $this->request->getPost('precio_anterior'),
            'icono' => $this->request->getPost('icono'),
            'color_clase'  => $this->request->getPost('color_clase'),
            'ahorro'  => $this->request->getPost('ahorro'),
            'validez' => $this->request->getPost('validez'),
            'estado' => $this->request->getPost('estado') 
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('promociones/nuevo'))->with('success', 'Promoción actualizada');
        } else {
            return redirect()->back()->with('error', 'No se pudieron guardar los cambios');
        }
    }

    public function guardarClase()
    {
        $model = new ClaseModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'horario' => $this->request->getPost('horario'),
            'cupos_max' => $this->request->getPost('cupos_max'),
            'id_instructor' => $this->request->getPost('id_instructor')
        ];
        if ($model->insert($data)) {
            return redirect()->to(base_url('gestion/clases'))->with('success', 'Clase creada con éxito');
        }
    }

   public function Clases() {
        if (session()->get('rol') !== 'administrador') {
            return redirect()->to(base_url('gestion'))->with('error', 'No tienes permiso para gestionar clases.');
        }
        $claseModel = new ClaseModel();
        $personaModel = new PersonaModel();

        $data = [
            'clases' => $claseModel->getClasesConInstructor(), 
            'instructores' => $personaModel->where('rol', 'instructor')->findAll() 
        ];

        return view('nueva_clase', $data);  
    }
    public function editarClase($id) {
        $model = new ClaseModel();
        $personaModel = new PersonaModel();

        $data['clase'] = $model->find($id);
        if (!$data['clase']) {
            return redirect()->to(base_url('gestion/clases'))->with('error', 'Clase no encontrada');
        }

        // Necesitamos los instructores para el select de la edición
        $data['instructores'] = $personaModel->where('rol', 'instructor')->findAll();

        return view('editar_clases', $data);
    }

    public function actualizarClase($id) {
        $model = new ClaseModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'id_instructor' => $this->request->getPost('id_instructor'),
            'horario' => $this->request->getPost('horario'),
            'cupos_max' => $this->request->getPost('cupos_max'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('gestion/clases'))->with('success', 'Clase actualizada');
        }
        return redirect()->back()->with('error', 'No se pudo actualizar');
    }
    public function eliminarClase($id) {
        $model = new ClaseModel();
        if ($model->delete($id)) {
            return redirect()->to(base_url('gestion/clases'))->with('success', 'Clase eliminada');
        }
        return redirect()->to(base_url('gestion/clases'))->with('error', 'Error al eliminar');
    }

    public function inscribirSocio(){
        $inscripcionModel = new InscripcionModel();
        $claseModel = new ClaseModel();

        $id_socio = $this->request->getPost('id_socio');
        $id_clase = $this->request->getPost('id_clase');

        // Si está inscrito
        if ($inscripcionModel->yaEstaInscrito($id_socio, $id_clase)) {
            return redirect()->back()->with('error', 'El socio ya está en la clase');
        }

        // Cupos disponibles
        $clase = $claseModel->find($id_clase);
        $inscritosActuales = $inscripcionModel->where('id_clase', $id_clase)->countAllResults();

        if ($inscritosActuales >= $clase['cupos_max']) {
            return redirect()->back()->with('error', 'La clase ya alcanzó el límite.');
        }

        // Inscripcion
        $data = [
            'id_socio' => $id_socio,
            'id_clase' => $id_clase,
            'fecha_inscripcion' => date('Y-m-d H:i:s')
        ];

        if ($inscripcionModel->insert($data)) {
            return redirect()->to(base_url('gestion'))->with('success', 'Socio inscrito correctamente');
        }

        return redirect()->back()->with('error', 'Ocurrió un error al inscribir.');
    }

    public function inscripcion($id) {
        $personaModel = new PersonaModel();
        $claseModel = new ClaseModel();

        $data['socio'] = $personaModel->find($id);
        if (!$data['socio']) {
            return redirect()->to(base_url('gestion'))->with('error', 'Socio no encontrado.');
        }

        $data['clases'] = $claseModel->findAll(); // Traemos todas las disciplinas (Yoga, Boxeo, etc.)

        return view('inscribir_socio', $data);
    }
    public function verInscritos($id_clase)
    {   
        $inscripcionModel = new InscripcionModel();
        
        $claseModel = new ClaseModel();

        $data['clase'] = $claseModel->find($id_clase);
        
        $data['alumnos'] = $inscripcionModel->getInscritosPorClase($id_clase);


        return view('ver_inscritos', $data);

        echo $inscripcionModel->prueba();
    }
    
    
    
}