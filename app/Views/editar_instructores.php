<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title>Editar Instructor</title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div id="content-reg" class="content">
        <h2>Editar Instructor</h2>
        <form method="POST" action="<?= base_url('instructores/actualizar') ?>" autocomplete="off" enctype="multipart/form-data">

            <!-- Token de seguridad -->
            <?= csrf_field(); ?>
    
            <!-- Se manda el id oculto solo al backend -->
            <input type="hidden" name="id_persona" value="<?= esc($instructor['id']) ?>">
            <input type="hidden" name="foto_actual" value="<?= esc($instructor['foto']) ?>">

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
                    <input type="text" placeholder="Juan Alejandro" value="<?= esc($instructor['nombres']) ?>" name="nombres" id="nombres" required>
                </div>
                <div class="campo2">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" placeholder="Pérez Gutierrez" value="<?= esc($instructor['apellidos']) ?>" name="apellidos" id="apellidos" required>
                </div>
                <div class="campo2">
                    <label for="descripcion">Descripción</label>
                    <input type="text" placeholder="Ej: Especialista en ..." value="<?= esc($instructor['descripcion']) ?>" name="descripcion" id="descripcion" required>
                </div>
                <div class="campo2">
                    <label for="habilidades">Habilidades</label>
                    <input type="text" placeholder="Certificación, Ganancia Muscular" value="<?= esc($instructor['habilidades']) ?>" name="habilidades" id="habilidades" required>
                </div>
                <div class="campo2">
                    <label for="horario_disponibilidad">Horario Disponible</label>
                    <input type="text" placeholder="Ej: Lun - Vie: 07:00 AM - 01:00 PM" value="<?= esc($instructor['horario_disponibilidad']) ?>" name="horario_disponibilidad" id="horario_disponibilidad" required>
                </div>
                <div class="campo2">
                    <label for="numero_telefonico">Número de Teléfono</label>
                    <input type="tel" placeholder="0412-1234567" name="numero_telefonico" value="<?= esc($instructor['numero_telefonico']) ?>" id="numero_telefonico" required>
                </div>
                <div class="campo2">
                    <label for="foto">Cambiar Foto (opcional)</label>
                    <input type="file" name="foto" id="foto" accept="image/*">
                </div>
                <!-- Botones para guardar cambios o regresar -->
                <div class="rgtr-edit">
                    <input class="btns-editar" type="submit" value="Guardar Cambios"/>
                    <a href="<?= base_url('gestion_instructores') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>;