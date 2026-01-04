<?= $this->extend('layouts\plantilla') ?>
<?= $this->section('titulo') ?>
    <title> Editar Usuario Beneficiario </title>
<?= $this->endSection() ?>
<?= $this->section('contenido') ?>

    <div id="content-reg" class="content">
        <h2>Editar Usuario</h2>

        <form method="POST" action="<?= base_url('usuarios/actualizar') ?>" autocomplete="off">

            <?= csrf_field(); ?>

            <input type="hidden" name="id_persona" value="<?= esc($persona['id_persona']) ?>">
            <input type="hidden" name="rol" value="beneficiario">


            <div class="alertas"></div>
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

                <h3>Membresía - Información</h3>

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

                <div class="rgtr-edit">
                    <input class="btns-editar" type="submit" value="Guardar Cambios"/>
                    <a href="<?= base_url('gestion') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                </div>
            </div>
        </form>
    </div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
<?= $this->endSection() ?>