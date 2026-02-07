
<!-- Plantilla que contiene el nav y el footer que se va a usar en todo el proyecto -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Sección que se puede cambiar cuando se use la plantilla -->
    <?= $this->renderSection('titulo') ?>

    <!-- Enlace con los estilos e iconos que se van a usar -->
    <link href="<?= base_url('estilos/estilo.css') ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <script src="https://kit.fontawesome.com/00a1f99971.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="padre">
        <nav>
            <div class="logo">
                <div >
                    <img src="<?= base_url('imagenes/imagen1.png') ?>" alt="FitGymPro" width="50" title="FitGymPro">
                </div>
                <div class="text-logo" >
                    <span class="a">FitGymPro</span>
                    <span class="b">Gestión Inteligente</span>
                </div>
            </div>
            <div class="menu"> 
                <a href="<?= base_url('/')?>" id="op0"> Inicio </a>
                <a href="<?= base_url('instalaciones') ?>" id="op1"> Instalaciones</a>
                <a href="<?= base_url('instructores') ?>" id="op2"> Instructores </a>
                <a href="<?= base_url('promociones') ?>" id="op3"> Promociones </a>
            </div>
        </nav>

        <!-- Sección que se puede cambiar -->
        <?= $this->renderSection('contenido') ?>

        <footer>
            <div class="footer-contenedor">
                <div class="footer-columna">
                    <div class="elementos">
                        <img src="<?= base_url('imagenes/imagen1.png') ?>" alt="FitGymPro" width="60" title="FitGymPro">
                        <span>FitGymPro</span>
                    </div>
                    <p>Ubicados en Venezuela, Edo. La Guaira, nos encuentras en el centro de Maiquetía</p>
                </div>
                <div class="footer-columna">
                    <h3>Contacto</h3>
                    <ul>
                        <li><i class="fa-solid fa-phone"></i> xxxxxxxxx </li>
                        <li><i class="fa-regular fa-envelope"></i> xxxxxxxxx </li>                      
                        <li><i class="fa-solid fa-location-dot"></i> xxxxxxxx </li>
                    </ul>
                </div>
                <div class="footer-columna">
                    <h3>Horarios</h3>
                    <ul>
                        <li>Lunes - Viernes: 6:00 - 23:00</li>
                        <li>Sábados: 8:00 - 21:00</li>
                        <li>Domingos: 9:00 - 20:00</li>
                    </ul>
                </div>
                <div class="footer-columna">
                    <h3>Síguenos</h3>
                    <div>
                        <a href="<?= base_url('#') ?>"><i class="fa-brands fa-facebook"></i></a>
                        <a href="<?= base_url('#') ?>"><i class="fa-brands fa-instagram"></i></a>
                        <a href="<?= base_url('#') ?>"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Sección que se puede cambiar-->
    <?= $this->renderSection('script') ?>

</body>
</html>