<!-- Llamado a la plantilla que se está usando -->
<?=  $this->extend('layouts/plantilla') ?>

<!-- Información cambiante de la plantilla -->
<?= $this->section('titulo') ?>
    <title>FitGymPro</title>
<?= $this->endSection() ?>

<!-- Información cambiante de la plantilla -->
<?= $this->section('contenido') ?>

    
    <h1 class="titulo">Bienvenido a FitGymPro</h1>
    <div class="decoracion-transparent">
        <p> Sistema de Gestión Avanzado</p>
    </div>
    <p class="texto"> La plataforma definitiva para gestionar usuarios, membresías e <br> instalaciones de tu gimnasio con tecnología de última<br> generación.</p>
    <div class="botones"> 
        <a class="primer-btn" href="<?= base_url('promociones') ?>"> Ver Promociones </a>
        <a class="segundo-btn" href="#"> Consultar Membresía </a>
    </div>
    <div class="contenedor">
        <div class="tarjetas"> 
            <h3> 500+ </h3>
            <p>Miembros Activos</p>
        </div>
        <div class="tarjetas"> 
            <h3> 15+ </h3>
            <p>Instructores</p>
        </div>
        <div class="tarjetas"> 
            <h3> 24/7 </h3>
            <p>Acceso</p>
        </div>
    </div>

    <!-- Buscador de Membresías -->
    <section class="centrado1">
        <h1 class="titulo-consulta">Consulta de Membresía</h1>
        <p class="parrafo-consulta"> Ingresa tu cédula para consultar tu información y estado de membresía</p>
        <div class="contenedor-buscador">
            <input type="text" id="buscar" placeholder="Ingresa tu número de cédula (ej: 12345678)">
            <button onclick="buscarUsuario()" class="btn-buscar"> 
                <span class="material-symbols-outlined">search</span>
                Buscar 
            </button>
        </div>
    </section>

    <!-- La respuesta del buscador -->
    <div class="resultado" id="resultado">
        <div class="encabezado">
            <div class="info-usuario">
                <!--<img class="foto-usuario" id ="foto-usuario" alt="foto-perfil" title="perfil"> -->
                <div class="datos-principales">
                    <h2 id="nombre-usuario"></h2>
                    <p>Cédula: <span id="cedula-usuario"></span></p>
                </div>
            </div>
            <div class="estado" id="estado">
                <span id="texto-estado"></span>
            </div>
        </div>
        <div class="cuerpo">
            <div class="dato">
                <i class="fa-regular fa-user"></i>
                <div class="datos-personales">
                    <small>Email</small>
                    <span id="email-usuario"></span>
                </div>
            </div>
            <div class="dato">
                <i class="fa-solid fa-phone"></i>
                <div class="datos-personales">
                    <small>Teléfono</small>
                    <span id="telefono-usuario"></span>
                </div>
            </div>
            <div class="dato">
                <i class="fa-regular fa-credit-card"></i>
                <div class="datos-personales">
                    <small>Membresía</small>
                    <span id="membresia-usuario"></span>
                </div>
            </div>
            <div class="dato">
                <i class="fa-regular fa-calendar"></i>
                <div class="datos-personales">
                    <small>Válida hasta</small>
                    <span id="validez-usuario"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Mensaje de error del buscador -->
    <div class="mensaje-error" id="mensaje_error">
        <div>
            <i class="fa-regular fa-circle-xmark"></i>
        </div>
        <p>
            La cédula ingresada no existe en el sistema. Por favor, verifica e intenta nuevamente.
        </p>
    </div>
<?= $this->endSection() ?>

<!-- Información cambiante de la plantilla -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/login.js')?>" ></script>
    <script src="<?= base_url('js/buscador.js') ?>"></script>
<?= $this->endSection() ?>
