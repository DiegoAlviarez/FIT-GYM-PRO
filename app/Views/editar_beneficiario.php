
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts/plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Editar Usuario Beneficiario </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>

<!-- Vista de edición del usuario cuando es beneficiario -->
    <div id="content-reg" class="content">
        <h2>Editar Usuario</h2>

        <form method="POST" action="<?= base_url('usuarios/actualizar') ?>" autocomplete="off">

            <!-- Token de seguridad -->
            <?= csrf_field(); ?>

            <!-- Se manda el id oculto solo al backend -->
            <input type="hidden" name="id" value="<?= esc($persona['id']) ?>">
            <input type="hidden" name="es_titular" value="0">

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

            <!-- Campos para editar -->
            <div class="cuerpo2">
                <div class="campo2">
                    <label for="nombres">Nombre</label>
                    <input type="text" name="nombres" value="<?= esc($persona['nombres']) ?>" id="nombres" required>
                </div>
                <div class="campo2">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" value="<?= esc($persona['apellidos']) ?>" id="apellidos" required>
                </div>
                <div class="campo2">
                    <label for="ci">Cédula</label>
                    <input type="text" name="ci" value="<?= esc($persona['ci']) ?>" id="ci" required>
                </div>
                <div class="campo2">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="<?= esc($persona['email']) ?>" required>
                </div>

                <div class="campo2">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" value="<?= esc($persona['telefono']) ?>" required>
                </div>

                <!-- Campos que no se pueden editar (le corresponde al principal) -->
                <h3 class="sub-form">Información de la Membresía</h3>

                <div class="campo2">
                    <label>Tipo</label>
                    <input type="text" value="<?= esc($plan['nombre']) ?>" disabled>
                </div>

                <div class="campo2">
                    <label>Estado</label>
                    <input type="text" value="<?= esc($membresia['estado']) ?>" disabled>
                </div>
                <div class="campo2">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= esc($membresia['fecha_inicio']) ?>" disabled>
                </div>
                <div class="campo2">
                    <label for="fecha_fin">Fecha de Fin</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" value="<?= esc($membresia['fecha_fin']) ?>" disabled>
                </div>
                
                <!-- Botones para guardar cambios o regresar -->
                <div class="rgtr-edit">
                    <input class="btns-editar" type="submit" value="Guardar Cambios"/>
                    <a href="<?= base_url('gestion') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                </div>
            </div>
        </form>
    </div>

<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
<?= $this->endSection() ?>