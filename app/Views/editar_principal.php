<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title>Editar Usuario Principal</title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    
<!-- Vista de edición del usuario cuando es principal -->
    <div id="content-reg" class="content">
    
        <h2>Editar Usuario</h2>
        <form method="POST" action="<?= base_url('usuarios/actualizar') ?>" autocomplete="off">

            <!-- Token de seguridad -->
            <?= csrf_field(); ?>
    
            <!-- Se manda el id oculto solo al backend -->
            <input type="hidden" name="id" value="<?= esc($persona['id']) ?>">
            <input type="hidden" name="es_titular" value="1">

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

            <!--Campos que se deben actualizar -->
            <div class="cuerpo2">
                <div class="campo2">
                    <label for="nombres">Nombres</label>
                    <input type="text" name="nombres" value="<?= esc($persona['nombres']) ?>" id="nombres" required>
                </div>
                <div class="campo2">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" value="<?= esc($persona['apellidos']) ?>" id="apellidos" required>
                </div>
                <div class="campo2">
                    <label for="ci">Cédula de Identidad</label>
                    <input type="text" name="ci" value="<?= esc($persona['ci']) ?>" id="ci" required>
                </div>
                <div class="campo2">
                    <label for="estado">Estado de la Membresía</label>
                    <select id="estado" name="estado_actual">
                        <option value="activo" <?= $membresia['estado_actual']=='activo'?'selected':'' ?>>Activo</option>
                        <option value="vencido" <?= $membresia['estado_actual']=='vencido'?'selected':'' ?>>Vencido</option>
                    </select>
                </div>
                <div class="campo2">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="<?= esc($persona['email']) ?>" required>
                </div>
                <div class="campo2">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" value="<?= esc($persona['telefono']) ?>" required>
                </div>
                <div class="campo2">
                    <label for="id_plan">Tipo de Membresía:</label>
                    <select id="id_plan" name="id_plan">
                        <optgroup label="Membresías Estándar">
                            <option value="2" <?= $membresia['id_plan']=='2'?'selected':'' ?>>Mensualidad Básica</option>
                            <option value="3" <?= $membresia['id_plan']=='3'?'selected':'' ?>>Plan Trimestral</option>
                            <option value="4" <?= $membresia['id_plan']=='4'?'selected':'' ?>>Plan Semestral</option>
                            <option value="5" <?= $membresia['id_plan']=='5'?'selected':'' ?>>Anualidad Regular</option>
                        </optgroup>
                        <optgroup label="Promociones Activas">
                            <option value="1" <?= $membresia['id_plan']=='1'?'selected':'' ?>>Promo 2x1 en membresías</option>
                            <option value="6" <?= $membresia['id_plan']=='6'?'selected':'' ?>>Plan Familiar (4 personas)</option>
                            <option value="7" <?= $membresia['id_plan']=='7'?'selected':'' ?>>Plan Personal Training</option>
                            <option value="8" <?= $membresia['id_plan']=='8'?'selected':'' ?>>Anualidad Premium (Oferta)</option>
                        </optgroup>
                    </select>
                </div>

                <!-- Los beneficiarios solo aparecen si el caso aplica -->
                <div class="beneficiario" id="bnf2">
                    <h3>Beneficiario 2</h3>
                    <input type="hidden" name="beneficiarios[0][id]" value="<?= $beneficiarios[0]['id'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[0][nombres]" value="<?= $beneficiarios[0]['nombres'] ?? '' ?>"/>
                        <input type="text" name="beneficiarios[0][apellidos]" value="<?= $beneficiarios[0]['apellidos'] ?? '' ?>"/>
                        <input type="email" name="beneficiarios[0][email]" value="<?= $beneficiarios[0]['email'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[0][telefono]" value="<?= $beneficiarios[0]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="beneficiario" id="bnf3">
                    <h3>Beneficiario 3</h3>
                    <input type="hidden" name="beneficiarios[1][id]" value="<?= $beneficiarios[1]['id'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[1][nombres]" value="<?= $beneficiarios[1]['nombres'] ?? '' ?>" />
                        <input type="text" name="beneficiarios[1][apellidos]" value="<?= $beneficiarios[1]['apellidos'] ?? '' ?>" />
                        <input type="email" name="beneficiarios[1][email]" value="<?= $beneficiarios[1]['email'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[1][telefono]" value="<?= $beneficiarios[1]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="beneficiario" id="bnf4">
                    <h3>Beneficiario 4</h3>
                    <input type="hidden" name="beneficiarios[2][id]" value="<?= $beneficiarios[2]['id'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[2][nombres]" value="<?= $beneficiarios[2]['nombres'] ?? '' ?>"/>
                        <input type="text" name="beneficiarios[2][apellidos]" value="<?= $beneficiarios[2]['apellidos'] ?? '' ?>"/>
                        <input type="email" name="beneficiarios[2][email]" value="<?= $beneficiarios[2]['email'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[2][telefono]"value="<?= $beneficiarios[2]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="campo2">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= esc($membresia['fecha_inicio']) ?>" required>
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
    
