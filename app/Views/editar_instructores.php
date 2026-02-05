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
        <form method="POST" action="<?= base_url('instructores/actualizar/' . $instructor['id']) ?>" autocomplete="off" >

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
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" placeholder="Juan Alejandro" value="<?= esc($instructor['nombre']) ?>" name="nombre" id="nombre" required>
                </div>
                <div class="campo2">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" value="<?= esc($instructor['especialidad']) ?>" placeholder="Ej: Entrenamiento Funcional" required>
                </div>
                <div class="campo2">
                    <label for="experiencia">Años de Experiencia</label>
                    <input type="number" name="experiencia" id="experiencia" value="<?= esc($instructor['experiencia']) ?>" min="0" placeholder="Ej: 8">
                </div>
                <div class="campo2">
                    <label for="descripcion">Descripción</label>
                    <input type="text" placeholder="Ej: Especialista en ..." value="<?= esc($instructor['descripcion']) ?>" name="descripcion" id="descripcion" required>
                </div>
                <div class="campo2" >
                        <label for="certificaciones">Certificaciones (Separa con comas)</label>
                        <input type="text" name="certificaciones" id="certificaciones" value="<?= esc($instructor['certificaciones']) ?>" placeholder="Ej: NSCA, CrossFit Nivel 2, TRX">
                    </div>
                <div class="campo2">
                    <label for="horario_disponibilidad">Horario Disponible</label>
                    <input type="text" placeholder="Ej: Lun - Vie: 07:00 AM - 01:00 PM" value="<?= esc($instructor['horario_disponibilidad']) ?>" name="horario_disponibilidad" id="horario_disponibilidad" required>
                </div>
                <div class="campo2">
                    <label for="telefono">Número de Teléfono</label>
                    <input type="tel" placeholder="0412-1234567" name="telefono" value="<?= esc($instructor['telefono']) ?>" id="telefono" required>
                </div>

                <!-- Botones para guardar cambios o regresar -->
                <div class="rgtr-edit">
                    <input class="btns-editar" type="submit" value="Guardar Cambios"/>
                    <a href="<?= base_url('gestion/instructores') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>;