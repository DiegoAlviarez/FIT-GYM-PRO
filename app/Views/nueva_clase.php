
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts/plantilla') ?> 

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Socios </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div class="admin">

        <!-- Encabezado de la página -->
        <div class="admin-encabezado">
            <div>
                <h1>Panel de Administración</h1>
                <p>Gestión de Clases</p>
            </div>
            <div>
                <form name="navegador">
                    <select name="secciones" class="select-nav" onchange="destino()">
                        <option value="no">Seleccione  </option>
                        <option value="<?= base_url('gestion/instructores') ?>">Gestión de Instructores</option>
                        <option value="<?= base_url('gestion/clases') ?>">Gestión de Clases</option>
                        <option value="<?= base_url('promociones/nuevo') ?>">Gestión de Promociones</option>
                    </select>
                </form>
                <a href="<?= base_url('salir') ?>">
                    <input type="button" value="Cerrar Sesión" class="btn-salir">
                </a>
            </div>
        </div>
    
    <!-- Botones tipo pestañas para cambiar la vista -->
        <div class="pestañas">
            <input type="button" class="activo2" id="registrar" value="Registrar nuevas clases">
            <input type="button" id="gestionar" value="Gestionar Clases">
        </div>

    <!-- Vista de una de las pestañas -->

        <?php if (session()->getFlashdata('success')): ?>
            <div class="exito">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

            <!-- Mensaje de error -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    <!-- Formulario de registro de usuarios -->
        <div id="content-reg" class="content">
            <h2>Registrar Nueva Clase</h2>

            <form method="POST" action="<?= base_url('clases/guardar') ?>" autocomplete="off">
            
                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

            <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="nombre">Nombre de la Clase</label>
                        <input type="text" id="nombre" name="nombre" maxlength="50" placeholder="Ej: Yoga Avanzado" required>
                    </div>
                    <div class="campo2">
                        <label>Instructor Responsable</label>
                        <select name="id_instructor" required>
                            <option value="">Selecciona un instructor</option>
                            <?php foreach($instructores as $instructor): ?>
                                <option value="<?= $instructor['id'] ?>"><?= esc($instructor['nombre']) ?> - <?= esc($instructor['especialidad']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="campo2">
                        <label for="descripcion">Descripción de la Clase</label>
                        <textarea name="descripcion" id="descripcion" maxlength="250" placeholder="Explica brevemente de qué trata la clase..." rows="3"></textarea>
                    </div>
                    
                    <div class="campo2">
                        <label for="horario">Horario de la Clase</label>
                        <select name="horario" id="horario" required>
                            <option value="">Selecciona un bloque</option>
                            <optgroup label="Turno Mañana">
                                <option value="Lunes y Miércoles 7:00 AM">Lunes y Miércoles 7:00 AM</option>
                                <option value="Lunes y Miércoles 9:00 AM">Lunes y Miércoles 9:00 AM</option>
                                <option value="Martes y Jueves 8:00 AM">Martes y Jueves 8:00 AM</option>
                            </optgroup>
                            <optgroup label="Turno Tarde/Noche">
                                <option value="Lunes a Viernes 5:00 PM">Lunes a Viernes 5:00 PM</option>
                                <option value="Martes y Jueves 6:00 PM">Martes y Jueves 6:00 PM</option>
                                <option value="Sábados 9:00 AM">Sábados 9:00 AM (Especial)</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="campo2">
                        <label for="cupos_max">Capacidad Máxima (Cupos)</label>
                        <input type="number" name="cupos_max" id="cupos_max" maxlength="10" placeholder="Ej: 20" min="1" required>
                    </div>
                    
                    <div class="rgtr">
                        <input type="submit" value="Registrar Clase Nueva"/>
                    </div>
                </div>
            </form>
        </div>

    <!-- Vista de la otra pestaña -->
     <!-- Lista de personas registradas -->
        <div id="content-gstn" class="gestionar content">
            <div class="encabezado-tabla">
                <h2>Listado de Clases Activas</h2>
                
            </div>
        <!-- Encabezado de la tabla -->
            
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Clase</th>
                        <th>Instructor</th>
                        <th>Descripción</th>
                        <th>Horario</th>
                        <th>Cupos Max.</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!--Tabla dinámica -->
                <?php if (!empty($clases)): ?>
                    <?php foreach ($clases as $clase): ?>
                    <tr>
                        <td><?= esc($clase['id']) ?></td>
                        <td><?= esc($clase['nombre']) ?></td>
                        <td><?= esc($clase['nombre_instructor']) ?></td>
                        <td><?= esc($clase['descripcion']) ?>
                        <td><?= esc($clase['horario']) ?></td>
                        <td><?= esc($clase['cupos_max']) ?> </td>
                        
                        
                        <td class="actions">
                            <a href="<?= base_url('gestion/clases/inscritos/' . $clase['id']) ?>" class="btn-inscripcion">Ver Inscritos</a>
                            <a href="<?= base_url('clases/editar/' . $clase['id']) ?>" class="btn-edit"  onclick="return confirm('¿Estás seguro de que quieres editar la clase? "> Editar </a>
                            <a href="<?= base_url('clases/eliminar/' . $clase['id']) ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar la clase? Esta acción no se puede deshacer');"> Eliminar </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay clases en el sistema</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
        
</div>
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
    <script src="<?= base_url('js/navegacion.js') ?>"></script>
<?= $this->endSection() ?>