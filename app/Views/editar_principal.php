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
            <input type="hidden" name="id_persona" value="<?= esc($persona['id_persona']) ?>">
            <input type="hidden" name="rol" value="principal">

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
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" name="nombre" value="<?= esc($persona['nombre']) ?>" id="nombre" required>
                </div>
                <div class="campo2">
                    <label for="estado">Estado de la Membresía</label>
                    <select id="estado" name="estado">
                        <option value="Activa" <?= $membresia['estado']=='Activa'?'selected':'' ?>>Activa</option>
                        <option value="Vencida" <?= $membresia['estado']=='Vencida'?'selected':'' ?>>Vencida</option>
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
                    <label for="tipo_membresia">Tipo de Membresía:</label>
                    <select id="tipo_membresia" name="tipo_membresia">
                        <optgroup label="Membresías Estándar">
                            <option value="mensual" <?= $membresia['tipo']=='mensual'?'selected':'' ?>>Mensualidad Básica</option>
                            <option value="trimestral" <?= $membresia['tipo']=='trimestral'?'selected':'' ?>>Plan Trimestral</option>
                            <option value="Semestral" <?= $membresia['tipo']=='semestral'?'selected':'' ?>>Plan Semestral</option>
                            <option value="Anual" <?= $membresia['tipo']=='anual'?'selected':'' ?>>Anualidad Regular</option>
                        </optgroup>
                        <optgroup label="Promociones Activas">
                            <option value="2x1" <?= $membresia['tipo']=='2x1'?'selected':'' ?>>Promo 2x1 en membresías</option>
                            <option value="familiar" <?= $membresia['tipo']=='familiar'?'selected':'' ?>>Plan Familiar (4 personas)</option>
                            <option value="personal" <?= $membresia['tipo']=='personal'?'selected':'' ?>>Plan Personal Training</option>
                            <option value="anual_desc" <?= $membresia['tipo']=='anual_desc'?'selected':'' ?>>Anualidad Premium (Oferta)</option>
                        </optgroup>
                    </select>
                </div>

                <!-- Los beneficiarios solo aparecen si el caso aplica -->
                <div class="beneficiario" id="bnf2">
                    <h3>Beneficiario 2</h3>
                    <input type="hidden" name="beneficiarios[0][id]" value="<?= $beneficiarios[0]['id_persona'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[0][nombre]" value="<?= $beneficiarios[0]['nombre'] ?? '' ?>"/>
                        <input type="email" name="beneficiarios[0][email]" value="<?= $beneficiarios[0]['email'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[0][telefono]" value="<?= $beneficiarios[0]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="beneficiario" id="bnf3">
                    <h3>Beneficiario 3</h3>
                    <input type="hidden" name="beneficiarios[1][id]" value="<?= $beneficiarios[1]['id_persona'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[1][nombre]" value="<?= $beneficiarios[1]['nombre'] ?? '' ?>" />
                        <input type="email" name="beneficiarios[1][email]" value="<?= $beneficiarios[1]['email'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[1][telefono]" value="<?= $beneficiarios[1]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="beneficiario" id="bnf4">
                    <h3>Beneficiario 4</h3>
                    <input type="hidden" name="beneficiarios[2][id]" value="<?= $beneficiarios[2]['id_persona'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[2][nombre]" value="<?= $beneficiarios[2]['nombre'] ?? '' ?>"/>
                        <input type="email" name="beneficiarios[2][email]" value="<?= $beneficiarios[2]['email'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[2][telefono]"value="<?= $beneficiarios[2]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="campo2">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= esc($membresia['fecha_inicio']) ?>" required>
                </div>
                <div class="campo2">
                    <label for="duracion">Duración</label>
                    <input type="text" id="duracion" name="duracion" value="<?= esc($membresia['duracion']) ?>" >
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
    
