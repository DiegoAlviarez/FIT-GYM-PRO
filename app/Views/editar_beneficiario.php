
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

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
            <input type="hidden" name="id_persona" value="<?= esc($persona['id_persona']) ?>">
            <input type="hidden" name="rol" value="beneficiario">

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
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" name="nombre" value="<?= esc($persona['nombre']) ?>" id="nombre" required>
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
                    <input type="text" value="<?= esc($membresia['tipo']) ?>" disabled>
                </div>

                <div class="campo2">
                    <label>Duración</label>
                    <input type="text" value="<?= esc($membresia['duracion']) ?>" disabled>
                </div>

                <div class="campo2">
                    <label>Estado</label>
                    <input type="text" value="<?= esc($membresia['estado']) ?>" disabled>
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