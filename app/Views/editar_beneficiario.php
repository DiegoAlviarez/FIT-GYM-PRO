
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

        <form method="POST" action="<?= base_url('usuarios/actualizar/' . $socio['id']) ?>" autocomplete="off">

            <!-- Token de seguridad -->
            <?= csrf_field(); ?>

            <!-- Mensaje de error -->
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alerta alerta-error">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Campos para editar -->
            <div class="cuerpo2">
                <div class="campo2">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?= esc($socio['nombre']) ?>" id="nombre" required>
                </div>
                <div class="campo2">
                    <label for="cedula">Cédula</label>
                    <input type="text" name="cedula" value="<?= esc($socio['cedula']) ?>" id="cedula" required>
                </div>
                <div class="campo2">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" value="<?= esc($socio['telefono']) ?>" required>
                </div>

                <!-- Campos que no se pueden editar (le corresponde al principal) -->
                <h3 class="sub-form">Información de la Membresía</h3>

                <div class="campo2">
                    <label>Tipo</label>
                    <input type="text" value="<?= esc($socio['nombre_plan']) ?>" disabled>
                </div>

                <div class="campo2">
                    <label>Estado</label>
                    <input type="text" value="<?= esc($socio['estado_pago']) ?>" disabled>
                </div>
                <div class="campo2">
                    <label for="fecha_pago">Fecha de Pago</label>
                    <input type="date" id="fecha_pago" name="fecha_pago" value="<?= esc($socio['fecha_pago']) ?>" disabled>
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