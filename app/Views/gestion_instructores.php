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
                <a href="<?= base_url('gestion') ?>">
                    <input type="button" value="Usuarios" class="btn-cambio">
                </a>
                <a href="<?= base_url('login') ?>">
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
        <!-- Formulario de registro de usuarios -->

        <div id="content-reg" class="content">
            <h2>Registrar Nuevo Instructor</h2>
            <form method="POST" action="<?= base_url('instructores/guardar') ?>" autocomplete="off" enctype="multipart/form-data">

                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

                <!-- Mensaje de éxito -->
                <?php if(session()->getFlashdata('mensaje')): ?>
                    <div class="alerta alerta-exito">
                        <?= session()->getFlashdata('mensaje') ?>
                    </div>
                <?php endif; ?>

                <!-- Mensaje de error -->
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alerta alerta-error">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="nombres">Nombres</label>
                        <input type="text" placeholder="Juan Alejandro" name="nombres" id="nombres" required>
                    </div>
                    <div class="campo2">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" placeholder="Pérez Gutierrez" name="apellidos" id="apellidos" required>
                    </div>
                    <div class="campo2">
                        <label for="descripcion">Descripción</label>
                        <input type="text" placeholder="Ej: Especialista en ..." name="descripcion" id="descripcion" required>
                    </div>
                    <div class="campo2">
                        <label for="habilidades">Habilidades</label>
                        <input type="text" placeholder="Ej: Certificación, Ganancia Muscular" name="habilidades" id="habilidades" required>
                    </div>
                    <div class="campo2">
                        <label for="horario_disponibilidad">Horario Disponible</label>
                        <input type="text" placeholder="Ej: Lun - Vie: 07:00 AM - 01:00 PM" name="horario_disponibilidad" id="horario_disponibilidad" required>
                    </div>
                    <div class="campo2">
                        <label for="numero_telefonico">Número de Teléfono</label>
                        <input type="tel" placeholder="0412-1234567" name="numero_telefonico" id="numero_telefonico" required>
                    </div>
                    <div class="campo2">
                        <label for="foto">Foto de Perfil</label>
                        <input type="file" name="foto" id="foto" accept="image/*" required>
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
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Descripción</th>
                        <th>Habilidades</th>
                        <th>Horarios Disponibles</th>
                        <th>Número Teléfonico</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de prueba  -->
                <?php if(!empty($instructores)):?>
                    <?php foreach($instructores as $instructor): ?>
                        <tr>
                            <td><?= esc($instructor['id']) ?></td>
                            <td><?= esc($instructor['nombres']) ?></td>
                            <td><?= esc($instructor['apellidos']) ?></td>
                            <td><?= esc($instructor['descripcion']) ?></td>
                            <td><?= esc($instructor['habilidades']) ?></td>
                            <td><?= esc($instructor['horario_disponibilidad']) ?></td>
                            <td><?= esc($instructor['numero_telefonico']) ?></td>
                            <td class="actions">
                                <a href="<?= base_url('instructores/editar/' . $instructor['id']) ?>" class="btn-edit"> Editar </a>
                                <a href="<?= base_url('instructores/eliminar' . $instructor['id']) ?>" class="btn-eliminar"> Eliminar </a>
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