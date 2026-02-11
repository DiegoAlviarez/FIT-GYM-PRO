
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?> 

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Socios </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div class="admin">

        <!-- Encabezado de la página -->
        <div class="admin-encabezado">
            <div>
                <h1>Panel de Administración</h1>
                <p>Gestión de usuarios y membresías</p>
            </div>
            <div>
                <a href="<?= base_url('salir') ?>">
                    <input type="button" value="Cerrar Sesión" class="btn-salir">
                </a>
            </div>
        </div>
    
    <!-- Botones tipo pestañas para cambiar la vista -->
        <div class="pestañas">
            <input type="button" class="activo2" id="registrar" value="Registrar Usuario">
            <input type="button" id="gestionar" value="Gestionar Usuarios">
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
        <div id="content-reg" class="content centrado">
            <h2>Registrar Nuevo Usuario</h2>

            <form method="POST" action="<?= base_url('panel/guardar') ?>" autocomplete="off">
            
                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

            <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="nombres">Nombre Completo</label>
                        <input type="text" placeholder="Ej: Juan Alejandro" name="nombre" id="nombres" required>
                    </div>
                    <div class="campo2">
                        <label for="cedula">Cédula</label>
                        <input type="text" placeholder="Ej: V-12345678" name="cedula" id="cedula" required>
                    </div>
                    
                    <div class="campo2">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" placeholder="Ej: +58 412 248-5263" name="telefono" id="telefono" required>
                    </div>
                    <div class="campo2">
                        <label for="id_plan">Tipo de Membresía:</label>
                        <select id="id_plan" name="plan" required>
                            <option value="">Selecciona una opción</option>

                            <!-- optgroup para separar en categorías las opciones -->
                            <optgroup label="Membresías Estándar">
                                <option value="2">Mensualidad Básica</option>
                                <option value="3">Plan Trimestral</option>
                                <option value="4">Plan Semestral</option>
                                <option value="5">Anualidad Regular</option>
                            </optgroup>
                            <optgroup label="Promociones Activas">
                                <option value="1">Promo 2x1 en membresías</option>
                                <option value="6">Plan Familiar (4 personas)</option>
                                <option value="7">Plan Personal Training</option>
                                <option value="8">Anualidad (Oferta)</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Campos para las personas beneficiadas (solo aparecen según el tipo de membresía) -->
                    <div class="beneficiario" id="bnf2">
                        <h3>Beneficiario 2</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombres" name="beneficiarios[nombre][]"/>
                            <input type="text" placeholder="Cédula" name="beneficiarios[cedula][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="beneficiario" id="bnf3">
                        <h3>Beneficiario 3</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombres" name="beneficiarios[nombre][]"/>
                            <input type="text" placeholder="Cédula" name="beneficiarios[cedula][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="beneficiario" id="bnf4">
                        <h3>Beneficiario 4</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombres" name="beneficiarios[nombre][]"/>
                            <input type="text" placeholder="Cédula" name="beneficiarios[cedula][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="campo2">
                        <label for="fecha_pago">Fecha de Pago</label>
                        <input type="date" id="fecha_pago" name="fecha_pago" required>
                    </div>
                    <div class="rgtr">
                        <input type="submit" value="Registrar Usuario"/>
                    </div>
                </div>
            </form>
        </div>

    <!-- Vista de la otra pestaña -->
     <!-- Lista de personas registradas -->
        <div id="content-gstn" class="gestionar content">
            <div class="encabezado-tabla">
                <h2>Listado de Miembros</h2>
            </div>
        <!-- Encabezado de la tabla -->

            
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cédula de Identidad</th>
                        <th>Télefono</th>
                        <th>Tipo de Plan</th>
                        <th>Estado de Pago</th>
                        <th>Fecha de Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!--Tabla dinámica -->
                <?php if (!empty($socios)): ?>
                    <?php foreach ($socios as $socio): ?>
                    <tr>
                        <td><?= esc($socio['id']) ?></td>
                        <td><?= esc($socio['nombre']) ?></td>
                        <td><?= esc($socio['cedula']) ?></td>
                        <td><?= esc($socio['telefono']) ?></td>
                        <td>
                            <?php if ($socio['socio_principal_id']): ?>
                                Beneficiario
                            <?php else: ?>
                                <?= esc($socio['nombre_plan'] ?? $socio['plan']) ?>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($socio['estado_pago']) ?></td>
                        <td><?= esc($socio['fecha_pago']) ?></td>
                        
                        <td class="actions">
                            <a href="<?= base_url('socios/editar/' . $socio['id']) ?>" class="btn-edit" onclick="return confirm('¿Estás seguro de que quieres editar a <?= esc($socio['nombre']) ?>?');"> Editar </a>
                            <a href="<?= base_url('socios/eliminar/' . $socio['id']) ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar a <?= esc($socio['nombre']) ?>? Esta acción no se puede deshacer');"> Eliminar </a>
                            <a href="<?= base_url('socios/inscripcion/' . $socio['id']) ?>" class="btn-inscripcion"> Inscribir en una clase </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10">Todavía no se ha cargado a nadie</td>
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
<?= $this->endSection() ?>