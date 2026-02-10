<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Instructores </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div class="admin">

    <!-- Encabezado de la página -->
        <div class="admin-encabezado">
            <div>
                <h1>Panel de Administración</h1>
                <p>Gestión de usuarios y membresías</p>
            </div>
            <div>
                <a href="<?= base_url('salir') ?>">
                    <input type="button" value="Cerrar Sesión" class="btn-salir">
                </a>
            </div>
        </div>

            <!-- Botones tipo pestañas para cambiar la vista -->
        <div class="pestañas">
            <input type="button" class="activo2" id="registrar" value="Registrar Instructor">
            <input type="button" id="gestionar" value="Gestionar Instructores">
        </div>

        <!-- Vista de una de las pestañas -->

        <!-- Mensaje de éxito -->
        <?php if(session()->getFlashdata('success')): ?>
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

        <!-- Formulario de registro de Instructores -->
        <div id="content-reg" class="content">
            <h2>Registrar Nuevo Instructor</h2>
            <form method="POST" action="<?= base_url('instructores/guardar') ?>" autocomplete="off" enctype="multipart/form-data" >

                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

                

                <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" placeholder="Juan Alejandro" name="nombre" id="nombre" required>
                    </div>
                    <div class="campo2">
                        <label for="especialidad">Especialidad</label>
                        <input type="text" name="especialidad" id="especialidad" placeholder="Ej: Entrenamiento Funcional" required>
                    </div>
                    <div class="campo2">
                        <label for="experiencia">Años de Experiencia</label>
                        <input type="text" name="experiencia" id="experiencia" min="0" placeholder="Ej: 8 años">
                    </div>
                    <div class="campo2">
                        <label for="descripcion">Descripción Profesional:</label>
                        <input type="text" placeholder="Ej: Especialista en ..." name="descripcion" id="descripcion" required>
                    </div>
                    <div class="campo2">
                        <label for="biografia">Biografía:</label>
                        <textarea placeholder="Historia del Instructor" name="biografia" id="biografia" required></textarea>
                    </div>
                    <div class="campo2" >
                        <label for="certificaciones">Certificaciones (Separa con comas)</label>
                        <input type="text" name="certificaciones" id="certificaciones" placeholder="Ej: NSCA, CrossFit Nivel 2, TRX">
                    </div>
                    <div class="campo2">
                        <label for="horario_disponibilidad">Horario Disponible</label>
                        <input type="text" placeholder="Ej: Lun - Vie: 07:00 AM - 01:00 PM" name="horario_disponibilidad" id="horario_disponibilidad" required>
                    </div>
                    <div class="campo2">
                        <label for="telefono">Número de Teléfono</label>
                        <input type="tel" placeholder="0412-1234567" name="telefono" id="telefono" required>
                    </div>
                    <div class="campo2">
                        <label for="foto">Foto del Instructor:</label>
                        <input type="file" name="foto" id="foto" accept="image/*">
                    </div>
                    <div class="rgtr">
                        <input type="submit" value="Registrar Instructor"/>
                    </div>
                </div>
            </form>
        </div>

        <!-- Vista de la otra pestaña -->
        <!-- Lista de personas registradas -->
        <div id="content-gstn" class="gestionar content">
            <div class="encabezado-tabla">
                <h2>Listado de Instructores</h2>
            </div>
            <!-- Encabezado de la tabla -->
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Biografía</th>
                        <th>Especialidad</th>
                        <th>Experiencia</th>
                        <th>Certificaciones</th>
                        <th>Horarios Disponibles</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de prueba  -->
                <?php if(!empty($instructores)):?>
                    <?php foreach($instructores as $instructor): ?>
                        <tr>
                            <td><?= esc($instructor['id']) ?></td>
                            <td><?= esc($instructor['nombre']) ?></td>
                            <td><?= esc($instructor['descripcion']) ?></td>
                            <td><?= esc($instructor['biografia']) ?></td>
                            <td><?= esc($instructor['especialidad']) ?></td>
                            <td><?= esc($instructor['experiencia']) ?></td>
                            <td><?= esc($instructor['certificaciones']) ?></td>
                            <td><?= esc($instructor['horario']) ?></td>
                            <td><?= esc($instructor['telefono']) ?></td>
                            <td class="actions grande">
                                <a href="<?= base_url('instructores/editar/' . $instructor['id']) ?>" class="btn-edit"> Editar </a>
                                <a href="<?= base_url('instructores/eliminar/' . $instructor['id']) ?>" class="btn-eliminar"> Eliminar </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9">No se ha cargado ningún instructor</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
        
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
<?= $this->endSection() ?>