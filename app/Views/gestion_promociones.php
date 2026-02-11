
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?> 

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Promociones </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div class="admin">

        <!-- Encabezado de la página -->
        <div class="admin-encabezado">
            <div>
                <h1>Gestión de Promociones</h1>
                <p>Administra las ofertas visibles en la página web</p>
            </div>
            <div>
                <form name="navegador">
                    <select name="secciones" class="select-nav" onchange="destino()">
                        <option value="no">Seleccione  </option>
                        <option value="<?= base_url('gestion/instructores') ?>">Gestión de Instructores</option>
                        <option value="<?= base_url('gestion/clases') ?>">Gestión de Clases</option>
                        <option value="<?= base_url('promociones/nuevo') ?>">Gestión de Promociones</option>
                    </select>
                </form>
                <a href="<?= base_url('salir') ?>">
                    <input type="button" value="Cerrar Sesión" class="btn-salir">
                </a>
            </div>
        </div>
    
    <!-- Botones tipo pestañas para cambiar la vista -->
        <div class="pestañas">
            <input type="button" class="activo2" id="registrar" value="Registrar Promoción">
            <input type="button" id="gestionar" value="Gestionar Promociones">
        </div>

    <!-- Vista de una de las pestañas -->

        <?php if (session()->getFlashdata('success')): ?>
            <div class="exito">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

            <!-- Mensaje de error -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    <!-- Formulario de registro de usuarios -->
        <div id="content-reg" class="content">
            <h2>Registrar Nueva Promoción</h2>

            <form method="POST" action="<?= base_url('promociones/guardar') ?>" autocomplete="off">
            
                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

            <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="titulo">Título de la Promoción</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Ej: 2x1 en Membresías" required>
                    </div>
                    <div class="campo2">
                        <label for="subtitulo">Descripción Corta </label>
                        <input type="text" name="subtitulo" id="subtitulo" placeholder="Ej: Trae un amigo y ahorra..." required>
                    </div>
                    
                    <div class="campo2">
                        <label for="precio_actual">Precio de Oferta</label>
                        <input type="text" name="precio_actual" id="precio_actual" placeholder="Ej: $40 o GRATIS" required>
                    </div>
                    <div class="campo2">
                        <label for="precio_anterior">Precio Anterior</label>
                        <input type="text" name="precio_anterior" id="precio_anterior" placeholder="Ej: $80">
                    </div>
                    <div class="campo2">
                        <label for="icono">Icono</label>
                        <input type="text" name="icono" id="icono" placeholder="Ej: fa-solid fa-bolt" required>
                    </div>

                    <div class="campo2">
                        <label for="color_clase">Color de la Tarjeta</label>
                        <select name="color_clase" id="color_clase" required>
                            <option value="azul">Azul</option>
                            <option value="verde">Verde</option>
                            <option value="morado">Morado</option>
                            <option value="anaranjado">Anaranjado</option>
                            <option value="negro">Negro</option>
                            <option value="amarillo">Amarillo</option>
                        </select>
                    </div>
                    
                    <div class="campo2">
                        <label for="ahorro">Texto de Ahorro</label>
                        <input type="text" name="ahorro" placeholder="Ej: Ahorra 50%">
                    </div>
                    <div class="campo2">
                        <label for="validez">Validez</label>
                        <input type="text" name="validez" placeholder="Ej: Válido hasta fin de mes">
                    </div>
                    <div class="rgtr">
                        <input type="submit" value="Publicar Promoción"/>
                    </div>
                </div>
            </form>
        </div>

    <!-- Vista de la otra pestaña -->
     <!-- Lista de personas registradas -->
        <div id="content-gstn" class="gestionar content">
            <div class="encabezado-tabla">
                <h2>Listado de Promociones</h2>
                <input type="text" placeholder="Buscar usuario" class="buscador">
            </div>
        <!-- Encabezado de la tabla -->

            
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Precio Actual</th>
                        <th>Precio Anterior</th>
                        <th>Ahorro</th>
                        <th>Validez</th>
                        <th>Color</th>
                        <th>Icono</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!--Tabla dinámica -->
                <?php if (!empty($promociones)): ?>
                    <?php foreach ($promociones as $promocion): ?>
                    <tr>
                        <td><?= esc($promocion['id']) ?></td>
                        <td><?= esc($promocion['titulo']) ?></td>
                        <td><?= esc($promocion['subtitulo']) ?></td>
                        <td><?= esc($promocion['precio_actual']) ?></td>
                        <td><?= esc($promocion['precio_anterior']) ?></td>
                        <td><?= esc($promocion['ahorro']) ?></td>
                        <td><?= esc($promocion['validez']) ?></td>
                        <td><?= ucfirst(esc($promocion['color_clase'])) ?></td>
                        <td><i class="<?= esc($promocion['icono']) ?>"></i></td>
                        <td><?= esc($promocion['estado']) ?> </td>
                        
                        <td class="actions grande">
                            <a href="<?= base_url('promociones/editar/' . $promocion['id']) ?>" class="btn-edit"  onclick="return confirm('¿Estás seguro de que quieres editar la promoción?');"> Editar </a>
                            <a href="<?= base_url('promociones/eliminar/' . $promocion['id']) ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar la promoción? Esta acción no se puede deshacer');"> Eliminar </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10">No se ha cargado ninguna promoción</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        
    </div>
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
    <script src="<?= base_url('js/navegacion.js') ?>"></script>
<?= $this->endSection() ?>