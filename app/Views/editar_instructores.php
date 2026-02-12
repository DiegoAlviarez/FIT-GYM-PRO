<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts/plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title>Editar Instructor</title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div id="content-reg" class="content">
        <h2>Editar Instructor</h2>
        <form method="POST" action="<?= base_url('instructores/actualizar/' . $instructor['id']) ?>" autocomplete="off" enctype="multipart/form-data" >

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
                    <input type="text" placeholder="Juan Alejandro" maxlength="50" value="<?= esc($instructor['nombre']) ?>" name="nombre" id="nombre" required>
                </div>
                <div class="campo2">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" maxlength="50 " value="<?= esc($instructor['especialidad']) ?>" placeholder="Ej: Entrenamiento Funcional" required>
                </div>
                <div class="campo2">
                    <label for="experiencia">Años de Experiencia</label>
                    <input type="text" name="experiencia" id="experiencia" maxlength="10" value="<?= esc($instructor['experiencia']) ?>" min="0" placeholder="Ej: 8">
                </div>
                <div class="campo2">
                    <label for="descripcion">Descripción</label>
                    <input type="text" placeholder="Ej: Especialista en ..." maxlength="60" value="<?= esc($instructor['descripcion']) ?>" name="descripcion" id="descripcion" required>
                </div>
                <div class="campo2">
                    <label for="biografia">Biografía:</label>
                    <textarea placeholder="Historia del Instructor" name="biografia" maxlength="1000" id="biografia" required><?= esc($instructor['biografia']) ?></textarea>
                </div>
                <div class="campo2" >
                        <label for="certificaciones">Certificaciones (Separa con comas)</label>
                        <input type="text" name="certificaciones" id="certificaciones" maxlength="200" value="<?= esc($instructor['certificaciones']) ?>" placeholder="Ej: NSCA, CrossFit Nivel 2, TRX">
                    </div>
                <div class="campo2">
                    <label for="horario">Horario Disponible</label>
                    <select name="horario" id="horario" required>
                        <option value="">Selecciona un bloque</option>
                        <option value="Mañana (07:00 AM - 12:00 PM)" <?= $instructor['horario'] == 'Mañana (07:00 AM - 12:00 PM)' ? 'selected' : '' ?>>Mañana (07:00 AM - 12:00 PM)</option>
                        <option value="Tarde (01:00 PM - 06:00 PM)" <?= $instructor['horario'] == 'Tarde (01:00 PM - 06:00 PM)' ? 'selected' : '' ?>>Tarde (01:00 PM - 06:00 PM)</option>
                        <option value="Noche (06:00 PM - 10:00 PM)" <?= $instructor['horario'] == 'Noche (06:00 PM - 10:00 PM)' ? 'selected' : '' ?>>Noche (06:00 PM - 10:00 PM)</option>
                        <option value="Tiempo Completo" <?= $instructor['horario'] == 'Tiempo Completo' ? 'selected' : '' ?>>Tiempo Completo</option>
                    </select>
                </div>
                <div class="campo2">
                    <label for="telefono">Número de Teléfono</label>
                    <input type="tel" placeholder="0412-1234567" name="telefono" maxlength="11" value="<?= esc($instructor['telefono']) ?>" id="telefono" required>
                </div>
                <div class="campo2">
                    <label for="foto">Foto del Instructor:</label>
                    <input type="file" name="foto" id="foto" accept="image/*">
                </div>
                <!-- Botones para guardar cambios o regresar -->
                <div class="rgtr-edit">
                    <input class="btns-editar" type="submit" value="Guardar Cambios"/>
                    <a href="<?= base_url('gestion/instructores') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>