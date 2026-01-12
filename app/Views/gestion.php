
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
                        <label for="nombres">Nombres</label>
                        <input type="text" placeholder="Juan Alejadro" name="nombres" id="nombres" required>
                    </div>
                    <div class="campo2">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" placeholder="García Mendoza" name="apellidos" id="apellidos" required>
                    </div>
                    <div class="campo2">
                        <label for="ci">Cédula</label>
                        <input type="text" placeholder="V-12345678" name="ci" id="ci" required>
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
                        <label for="id_plan">Tipo de Membresía:</label>
                        <select id="id_plan" name="id_plan" required>
                            <option value="">Selecciona una opción</option>

                            <!-- optgroup para separar en categorías las opciones -->
                            <optgroup label="Membresías Estándar">
                                <option value="1">Mensualidad Básica</option>
                                <option value="2">Plan Trimestral</option>
                                <option value="3">Plan Semestral</option>
                                <option value="4">Anualidad Regular</option>
                            </optgroup>
                            <optgroup label="Promociones Activas">
                                <option value="5">Promo 2x1 en membresías</option>
                                <option value="6">Plan Familiar (4 personas)</option>
                                <option value="7">Plan Personal Training</option>
                                <option value="8">Anualidad Premium (Oferta)</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Campos para las personas beneficiadas (solo aparecen según el tipo de membresía) -->
                    <div class="beneficiario" id="bnf2">
                        <h3>Beneficiario 2</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombres" name="beneficiarios[nombres][]"/>
                            <input type="text" placeholder="Apellidos" name="beneficiarios[apellidos][]"/>
                            <input type="email" placeholder="Correo Electrónico" name="beneficiarios[email][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="beneficiario" id="bnf3">
                        <h3>Beneficiario 3</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombres" name="beneficiarios[nombres][]"/>
                            <input type="text" placeholder="Apellidos" name="beneficiarios[apellidos][]"/>
                            <input type="email" placeholder="Correo Electrónico" name="beneficiarios[email][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="beneficiario" id="bnf4">
                        <h3>Beneficiario 4</h3>
                        <div class="fila">
                            <input type="text" placeholder="Nombres" name="beneficiarios[nombres][]"/>
                            <input type="text" placeholder="Apellidos" name="beneficiarios[apellidos][]"/>
                            <input type="email" placeholder="Correo Electrónico" name="beneficiarios[email][]"/>
                            <input type="tel" placeholder="Teléfono" name="beneficiarios[telefono][]"/>
                        </div>
                    </div>
                    <div class="campo2">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
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
