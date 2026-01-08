
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Usuarios </title>
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
                <a href="<?= base_url('gestion_instructores') ?>">
                    <input type="button" value="Instructores" class="btn-cambio">
                </a>
                <a href="<?= base_url('login') ?>">
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
    <!-- Formulario de registro de usuarios -->
        <div id="content-reg" class="content">
            <h2>Registrar Nuevo Usuario</h2>
            <form method="POST" action="<?= base_url('usuarios/guardar') ?>" autocomplete="off">
            
                <!-- Token de seguridad -->
                <?= csrf_field(); ?>

                <!-- Mensaje de error -->
                <?php if(session()->getFlashdata('error')): ?>
                    <div>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

            <!-- Campos para llenar -->
                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" placeholder="Juan Pérez" name="nombre" id="usuario" required>
                    </div>
                    <div class="campo2">
                        <label for="cedula">Cédula</label>
                        <input type="text" placeholder="V-12345678" name="cedula" id="cedula" required>
                    </div>
                    <div class="campo2">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" placeholder="juan@email.com" name="email" id="email" required>
                    </div>
                    <div class="campo2">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" placeholder="+58 412 248-5263" name="telefono" id="telefono" required>
                    </div>
                    <div class="campo2">
                        <label for="tipo_membresia">Tipo de Membresía:</label>
                        <select id="tipo_membresia" name="tipo_membresia" required>
                            <option value="">Selecciona una opción</option>

                            <!-- optgroup para separar en categorías las opciones -->
                            <optgroup label="Membresías Estándar">
                                <option value="mensual">Mensualidad Básica</option>
                                <option value="trimestral">Plan Trimestral</option>
                                <option value="semestral">Plan Semestral</option>
                                <option value="anual">Anualidad Regular</option>
                            </optgroup>
                            <optgroup label="Promociones Activas">
                                <option value="2x1">Promo 2x1 en membresías</option>
                                <option value="familiar">Plan Familiar (4 personas)</option>
                                <option value="personal">Plan Personal Training</option>
                                <option value="anual_desc">Anualidad Premium (Oferta)</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Campos para las personas beneficiadas (solo aparecen según el tipo de membresía) -->
                    <div class="beneficiario" id="bnf2">
                        <h3>Beneficiario 2</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombre" name="beneficiarios[nombre][]"/>
                            <input type="email" placeholder="Correo Electrónico" name="beneficiarios[email][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="beneficiario" id="bnf3">
                        <h3>Beneficiario 3</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombre" name="beneficiarios[nombre][]"/>
                            <input type="email" placeholder="Correo Electrónico" name="beneficiarios[email][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="beneficiario" id="bnf4">
                        <h3>Beneficiario 4</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombre" name="beneficiarios[nombre][]"/>
                            <input type="email" placeholder="Correo Electrónico" name="beneficiarios[email][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="campo2">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" id="fecha_inicioS" name="fecha_inicio" required>
                    </div>
                    <div class="campo2">
                        <label for="duracion">Duración</label>
                        <input type="text" id="duracion" placeholder="Tiempo de Membresía" name="duracion" required>
                    </div>
                    <div class="alertas"> </div>
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
                <input type="text" placeholder="Buscar usuario" class="buscador">
            </div>
        <!-- Encabezado de la tabla -->
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Plan</th>
                        <th>Estado</th>
                        <th>Vencimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de prueba  -->
                    <tr>
                        <td>001</td>
                        <td>xxjsjjsjjds</td>
                        <td>Trimestral</td>
                        <td>Activa</td>
                        <td>10/02/2026</td>
                        <td class="actions">
                            <a href="<?= base_url('editar/1') ?>" class="btn-edit"> Editar </a>
                            <a href="#" class="btn-eliminar"> Eliminar </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/formulario.js') ?>"></script>
<?= $this->endSection() ?>
