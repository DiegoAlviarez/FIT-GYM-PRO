
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?> 

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Edición de Promoción </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    
    <!-- Formulario de registro de usuarios -->
        <div id="content-reg" class="content">
            <h2>Editar Promoción</h2>

            <form method="POST" action="<?= base_url('promociones/actualizar/' . $promocion['id']) ?>" autocomplete="off">
            
                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

            <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="titulo">Título de la Promoción</label>
                        <input type="text" name="titulo" id="titulo" value="<?= esc($promocion['titulo']) ?>" placeholder="Ej: 2x1 en Membresías" required>
                    </div>
                    <div class="campo2">
                        <label for="subtitulo">Descripción Corta </label>
                        <input type="text" name="subtitulo" id="subtitulo" value="<?= esc($promocion['subtitulo']) ?>" placeholder="Ej: Trae un amigo y ahorra..." required>
                    </div>
                    
                    <div class="campo2">
                        <label for="precio_actual">Precio de Oferta</label>
                        <input type="text" name="precio_actual" id="precio_actual" value="<?= esc($promocion['precio_actual']) ?>" placeholder="Ej: $40 o GRATIS" required>
                    </div>
                    <div class="campo2">
                        <label for="precio_anterior">Precio Anterior (Se verá tachado)</label>
                        <input type="text" name="precio_anterior" id="precio_anterior" value="<?= esc($promocion['precio_anterior']) ?>" placeholder="Ej: $80">
                    </div>
                    <div class="campo2">
                        <label for="icono">Icono (FontAwesome)</label>
                        <input type="text" name="icono" id="icono" value="<?= esc($promocion['icono']) ?>" placeholder="Ej: fa-solid fa-bolt" required>
                    </div>

                    <div class="campo2">
                        <label for="color_clase">Color de la Tarjeta</label>
                        <select name="color_clase" id="color_clase" required>
                            <?php 
                            $colores = ['azul', 'verde', 'morado', 'anaranjado', 'negro', 'amarillo'];
                            foreach($colores as $color): ?>
                                <option value="<?= $color ?>" <?= ($promocion['color_clase'] == $color) ? 'selected' : '' ?>>
                                    <?= ucfirst($color) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                    <div class="campo2">
                        <label for="ahorro">Texto de Ahorro</label>
                        <input type="text" name="ahorro" value="<?= esc($promocion['ahorro']) ?>" placeholder="Ej: Ahorra 50%">
                    </div>
                    <div class="campo2">
                        <label for="validez">Validez</label>
                        <input type="text" name="validez" value="<?= esc($promocion['validez']) ?>" placeholder="Ej: Válido hasta fin de mes">
                    </div>
                    <div class="campo2">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado">
                            <option value="activa" <?= ($promocion['estado'] == 'activa') ? 'selected' : '' ?>>Activa</option>
                            <option value="inactiva" <?= ($promocion['estado'] == 'inactiva') ? 'selected' : '' ?>>Inactiva</option>
                        </select>
                    </div>
                    <div class="rgtr">
                        <input type="submit" value="Guardar Cambios"/>
                    </div>
                </div>
            </form>
        </div>

<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
<?= $this->endSection() ?>