<?=  $this->extend('layouts\plantilla') ?>
<?= $this->section('titulo') ?>
    <title>FitGymPro</title>
<?= $this->endSection() ?>
<?= $this->section('contenido') ?>

    <div class="decoracion-transparent">
        <p> Sistema de Gestión Avanzado</p>
    </div>
    <h1 class="titulo">Bienvenido a FitGymPro</h1>
    <p class="texto"> La plataforma definitiva para gestionar usuarios, membresías e <br> instalaciones de tu gimnasio con tecnología de última<br> generación.</p>
    <div class="botones"> 
        <a class="primer-btn" href="#"> Ver Promociones </a>
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
    <section class="centrado1">
        <h1 class="titulo-consulta">Consulta de Membresía</h1>
        <p class="parrafo-consulta"> Ingresa tu id de usuario para consultar tu información y estado de membresía</p>
        <div class="contenedor-buscador">
            <input type="text" id="buscar" placeholder="Ingresa tu ID de usuario (ej: 001, 002, 003)">
            <button onclick="buscarUsuario()" class="btn-buscar"> 
                <span class="material-symbols-outlined">search</span>
                Buscar 
            </button>
        </div>
    </section>
    <div class="resultado" id="resultado">
        <div class="encabezado">
            <div class="info-usuario">
                <img class="foto-usuario" id ="foto-usuario" alt="foto-perfil" title="perfil">
                <div class="datos-principales">
                    <h2 id="nombre-usuario"></h2>
                    <p>ID: <span id="id-usuario"></span></p>
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
    <div class="mensaje-error" id="mensaje_error">
        <div class="">
            <i class="fa-regular fa-circle-xmark"></i>
        </div>
        <p>
            El ID ingresado no existe en el sistema. Por favor, verifica e intenta nuevamente.
        </p>
    </div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
    <script src="<?= base_url('js/login.js')?>" ></script>
    <script src="<?= base_url('js/buscador.js') ?>"></script>
<?= $this->endSection() ?>
