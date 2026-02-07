<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?=  $this->section('titulo') ?>
    <title>FitGymPro - Promociones </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    
<!-- Promociones activas del gimnasio -->
    
    <h1 class="titulo"> Promociones Activas </h1>
    <p class="texto"> Aprovecha nuestras ofertas exclusivas y comienza tu transformación hoy</p>
    <section class="grupo">
        <div class="tarjeta contenedor-tarjeta1">
            <div class="cabecera azul">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="contenido">
                <h2>2x1 en Membresías</h2>
                <p class="descuento"> Trae un amigo y ambos obtienen un 50% de descuento</p>
                <div>
                    <span class="pvp-actual"> $40  </span>
                    <span class="pvp-anterior"> $80  </span>
                </div>
                <p class="ahorro"> Ahorra 50%</p>
                <p class="validez"> Válido hasta fin de mes</p>
                <label for="btn-modalProm"  class="btn-azul"> Obtener Promoción </label>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta2 ">
            <div class="cabecera negro">
                <i class="fa-regular fa-heart"></i>
            </div>
            <div class="contenido">
                <h2>Clases de Yoga Gratis</h2>
                <p class="descuento"> Primera semana de clases de Yoga y Pilates sin costo</p>
                <div>
                    <span class="pvp-actual"> GRATIS  </span>
                    <span class="pvp-anterior"> $60  </span>
                    <br><br>
                </div>
                <p class="validez">Para nuevos miembros</p>
                <label for="btn-modalProm" class="btn-negro"> Obtener Promoción </label>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta5">
            <div class="cabecera anaranjado">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="contenido">
                <h2>Pack Personal Training </h2>
                <p class="descuento"> 5 sesiones de entrenamiento personalizado</p>
                <div>
                    <span class="pvp-actual"> $175 </span>
                    <span class="pvp-anterior"> $250  </span>
                    <br><br>
                </div>
                <p class="ahorro"> Ahorra 30%</p>
                <p class="validez"> 30% de descuento</p>
                <label for="btn-modalProm"   class="btn-anaranjado"> Obtener Promoción </label>
            </div>
        </div>
    </section>
    <section class="grupo">
        <div class="tarjeta contenedor-tarjeta6">
            <div class="cabecera verde">
                <i class="fa-regular fa-calendar"></i>
            </div>
            <div class="contenido">
                <h2>Membresía Anual Premium </h2>
                <p class="descuento"> Paga 10 meses y recibe 12 meses de acceso total</p>
                <div>
                    <span class="pvp-actual"> $800 </span>
                    <span class="pvp-anterior"> $960  </span>
                </div>
                <p class="ahorro"> Ahorra 17%</p>
                <p class="validez"> 2 meses gratis</p>
                <label for="btn-modalProm"  class="btn-verde"> Obtener Promoción </label>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta4">
            <div class="cabecera morado">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div class="contenido">
                <h2>Clase de Prueba HIIT</h2>
                <p class="descuento"> Una clase gratuita de alta intensidad con instructor</p>
                <div>
                    <span class="pvp-actual"> Gratis</span>
                    <span class="pvp-anterior"> $25  </span>
                    <br><br>
                </div>
                <p class="validez"> Para nuevos miembros</p>
                <label for="btn-modalProm"  class="btn-morado"> Obtener Promoción <label>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta3">
            <div class="cabecera amarillo">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="contenido">
                <h2>Plan Familiar </h2>
                <p class="descuento"> Hasta 4 miembros de la familia por un solo precio</p>
                <div>
                    <span class="pvp-actual"> $200 </span>
                    <span class="pvp-anterior"> $329  </span>
                </div>
                <p class="ahorro"> Ahorra 38%</p>
                <p class="validez"> Válido en temporada de vacaciones </p>
                <label for="btn-modalProm" class="btn-amarillo"> Obtener Promoción </label>
            </div>
        </div>
    </section>

<!-- Botón para contactar con un asesor-->
    <div class="contenedor-transparente">
        <div class="centrado">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            <h3>¿No encuentras la promoción perfecta?</h3>
            <p>Contáctanos y crearemos un plan personalizado para ti</p>
            <label for="btn-asesor" class="reservar-btn"> Contactar Asesor </label>
        </div>
    </div>

|   <!-- Ventana Emergente de promociones -->
    <input type="checkbox" id="btn-modalProm">
    <div class="container-modalProm">
        <div class="content-modalProm">
            <h2>¡Felicidades!</h2>
            <p>Te falta un paso más, contáctanos al número de teléfono para activar la promoción: +58 412 325-4789 </p>
            <div class="btn-cerrarModalProm">
                <label for="btn-modalProm">Cerrar </label>
            </div>
        </div>
        <label for="btn-modalProm" class="cerrarModalProm"></label>
    </div>

    <!-- Ventana Emergente de Asesoría -->
    <input type="checkbox" id="btn-asesor">
    <div class="container-modalProm">
        <div class="content-modalProm">
            <h2>Obten una promoción especial</h2>
            <p>Nos ajustamos a tus necesidades, comunícate con nosotros para mayor información: +58 412 325-4789 </p>
            <div class="btn-cerrarModalProm">
                <label for="btn-asesor">Cerrar </label>
            </div>
        </div>
        <label for="btn-asesor" class="cerrarModalProm"></label>
    </div>
    
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="op3.js"></script>    
<?= $this->endSection() ?>
