<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts/plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title>Editar Usuario Principal</title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    
<!-- Vista de edición del usuario cuando es principal -->
    <div id="content-reg" class="content">
    
        <h2>Editar Usuario</h2>
        <form method="POST" action="<?= base_url('usuarios/actualizar/' . $socio['id']) ?>" autocomplete="off">

            <!-- Token de seguridad -->
            <?= csrf_field(); ?>


            <!-- Mensaje de error -->
            <?php if(session()->getFlashdata('error')): ?>
                <div class="error">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!--Campos que se deben actualizar -->
            <div class="cuerpo2">
                <div class="campo2">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombre" maxlength="70" value="<?= esc($socio['nombre']) ?>" id="nombre" required>
                </div>
                <div class="campo2">
                    <label for="cedula">Cédula de Identidad</label>
                    <input type="text" name="cedula" maxlength="12" value="<?= esc($socio['cedula']) ?>" id="cedula" required>
                </div>
                <div class="campo2">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" maxlength="11" id="telefono" value="<?= esc($socio['telefono']) ?>" required>
                </div>
                <div class="campo2">
                    <label for="id_plan">Tipo de Membresía:</label>
                    <select id="id_plan" name="id_plan">
                        <optgroup label="Membresías Estándar">
                            <option value="2" <?= $socio['plan']=='2'?'selected':'' ?>>Mensualidad Básica</option>
                            <option value="3" <?= $socio['plan']=='3'?'selected':'' ?>>Plan Trimestral</option>
                            <option value="4" <?= $socio['plan']=='4'?'selected':'' ?>>Plan Semestral</option>
                            <option value="5" <?= $socio['plan']=='5'?'selected':'' ?>>Anualidad Regular</option>
                        </optgroup>
                        <optgroup label="Promociones Activas">
                            <option value="1" <?= $socio['plan']=='1'?'selected':'' ?>>Promo 2x1 en membresías</option>
                            <option value="6" <?= $socio['plan']=='6'?'selected':'' ?>>Plan Familiar (4 personas)</option>
                            <option value="7" <?= $socio['plan']=='7'?'selected':'' ?>>Plan Personal Training</option>
                            <option value="8" <?= $socio['plan']=='8'?'selected':'' ?>>Anualidad Premium (Oferta)</option>
                        </optgroup>
                    </select>
                </div>

                <!-- Los beneficiarios solo aparecen si el caso aplica -->
                <div class="beneficiario" id="bnf2">
                    <h3>Beneficiario 2</h3>
                    <input type="hidden" name="beneficiarios[0][id]" value="<?= $beneficiarios[0]['id'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[0][nombre]" maxlength="40" value="<?= $beneficiarios[0]['nombre'] ?? '' ?>"/>
                        <input type="text" name="beneficiarios[0][cedula]" maxlength="12" value="<?= $beneficiarios[0]['cedula'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[0][telefono]" maxlength="11" value="<?= $beneficiarios[0]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="beneficiario" id="bnf3">
                    <h3>Beneficiario 3</h3>
                    <input type="hidden" name="beneficiarios[1][id]" value="<?= $beneficiarios[1]['id'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[1][nombre]" maxlength="40" value="<?= $beneficiarios[1]['nombre'] ?? '' ?>" />
                        <input type="text" name="beneficiarios[1][cedula]" maxlength="12" value="<?= $beneficiarios[1]['cedula'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[1][telefono]" maxlength="11" value="<?= $beneficiarios[1]['telefono'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="beneficiario" id="bnf4">
                    <h3>Beneficiario 4</h3>
                    <input type="hidden" name="beneficiarios[2][id]" value="<?= $beneficiarios[2]['id'] ?? '' ?>">
                    <div class="fila">
                        <input type="text" name="beneficiarios[2][nombre]" maxlength="40" value="<?= $beneficiarios[2]['nombre'] ?? '' ?>"/>
                        <input type="text" name="beneficiarios[2][cedula]" maxlength="12" value="<?= $beneficiarios[2]['cedula'] ?? '' ?>"/>
                        <input type="tel" name="beneficiarios[2][telefono]" maxlength="11" value="<?= $beneficiarios[2]['telefono'] ?? '' ?>"/>
                    </div>
                </div>

                <div class="campo2">
                    <label for="fecha_pago">Fecha de Pago</label>
                    <input type="date" id="fecha_pago" name="fecha_pago" value="<?= esc($socio['fecha_pago']) ?>" required>
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
    
