
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?> 

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Socios </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    
        <div id="content-reg" class="content">
            <h2>Registrar Nueva Clase</h2>

            <form method="POST" action="<?= base_url('clases/actualizar/' . $clase['id']) ?>" autocomplete="off">
            
                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

            <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="nombre">Nombre de la Clase</label>
                        <input type="text" id="nombre" name="nombre" value="<?= esc($clase['nombre']) ?>" placeholder="Ej: Yoga Avanzado" required>
                    </div>
                    <div class="campo2">
                        <label>Instructor Responsable</label>
                        <select name="id_instructor" required>
                            <?php foreach($instructores as $ins): ?>
                                <option value="<?= $ins['id'] ?>" <?= $ins['id'] == $clase['id_instructor'] ? 'selected' : '' ?>>  <?= esc($ins['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="campo2">
                        <label for="descripcion">Descripción de la Clase</label>
                        <textarea name="descripcion" id="descripcion" rows="3"><?= esc($clase['descripcion']) ?></textarea>
                    </div>
                    
                    <div class="campo2">
                        <label for="horario">Horario de la Clase</label>
                        <select name="horario" id="horario" required>
                            <option value="">Selecciona un bloque</option>
                            <optgroup label="Turno Mañana">
                                <option value="Lunes y Miércoles 7:00 AM" <?= $clase['horario'] == 'Lunes y Miércoles 7:00 AM' ? 'selected' : '' ?>>Lunes y Miércoles 7:00 AM</option>
                                <option value="Lunes y Miércoles 9:00 AM" <?= $clase['horario'] == 'Lunes y Miércoles 9:00 AM' ? 'selected' : '' ?>>Lunes y Miércoles 9:00 AM</option>
                                <option value="Martes y Jueves 8:00 AM" <?= $clase['horario'] == 'Martes y Jueves 8:00 AM' ? 'selected' : '' ?>>Martes y Jueves 8:00 AM</option>
                            </optgroup>
                            <optgroup label="Turno Tarde/Noche">
                                <option value="Lunes a Viernes 5:00 PM" <?=  $clase['horario'] == 'Lunes a Viernes 5:00 PM' ? 'selected' : '' ?>>Lunes a Viernes 5:00 PM</option>
                                <option value="Martes y Jueves 6:00 PM" <?= $clase['horario'] == 'Martes y Jueves 6:00 PM' ? 'selected' : '' ?>>Martes y Jueves 6:00 PM</option>
                                <option value="Sábados 9:00 AM" <?= $clase['horario'] == 'Sábados 9:00 AM' ? 'selected' : '' ?>>Sábados 9:00 AM (Especial)</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="campo2">
                        <label for="cupos_max">Capacidad Máxima (Cupos)</label>
                        <input type="number" name="cupos_max" value="<?= esc($clase['cupos_max']) ?>" id="cupos_max" placeholder="Ej: 20" min="1" required>
                    </div>
                    
                    <div class="rgtr">
                        <input type="submit" value="Guardar Cambios"/>
                        <a href="<?= base_url('clases/nuevo') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                    </div>
                </div>
            </form>
        </div>

  
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>

<?= $this->endSection() ?>