
<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title>FitGymPro - Instalaciones</title>
<?= $this->endSection() ?>

<!-- Contenido de la página-->
<?= $this->section('contenido') ?>

    <!-- Descripción de las zonas del gimnasio -->
    <h1 class="titulo"> Nuestras Instalaciones</h1>
    <p class="texto">Tecnología de punta y espacios diseñados para maximizar tu rendimiento</p>
    <section class="grupo">
        <div class="tarjeta contenedor-tarjeta1">
            <div class="cabecera azul">
                <i class="fa-solid fa-dumbbell"></i>
            </div>
            <div>
                <h2>Zona de pesas</h2>
                <p>Equipamiento de última generación para entrenamiento de fuerza</p>
                <ul>
                    <li> Mancuernas 1-50kg</li>
                    <li>Máquinas Hammer Strenght</li>
                    <li>Barras Olímpicas</li>
                </ul>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta2">
            <div class="cabecera negro">
                <i class="fa-regular fa-heart"></i>
            </div>
            <div>
                <h2>Cardio Premium</h2>
                <p>Área cardiovascular con tecnología interactiva</p>
                <ul>
                    <li>Cintas con pantalla 4k</li>
                    <li>Elípticas de bajo impacto</li>
                    <li>Bicicletas de spinning</li>
                </ul>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta3">
            <div class="cabecera amarillo" >
                <i class="fa-solid fa-water"></i>
            </div>
            <div>
                <h2>Piscina Climatizada</h2>
                <p>Piscina olímpica de 25 metros con control de temperatura</p>
                <ul>
                    <li>Sistema de filtrado</li>
                    <li>Carriles profesionales</li>
                    <li>Área de hidroterapia</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="grupo">
        <div class="tarjeta contenedor-tarjeta4">
            <div class="cabecera morado">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <h2>Salas de Clases</h2>
                <p>Espacios amplios para clases grupales</p>
                <ul>
                    <li>Yoga y Pilates</li>
                    <li>Spinning</li>
                    <li>CrossFit</li>
                </ul>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta5">
            <div class="cabecera anaranjado">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div>
                <h2>Zona Funcional</h2>
                <p>Entrenamiento funcional de alta intensidad</p>
                <ul>
                    <li>Rigs profesionales</li>
                    <li>Battle ropes</li>
                    <li>Neumáticos y sleds</li>
                </ul>
            </div>
        </div>
        <div class="tarjeta contenedor-tarjeta6">
            <div class="cabecera verde">
                <i class="fa-solid fa-wind"></i>
            </div>
            <div>
                <h2>Spa y Recovery</h2>
                <p>Centro de recuperación y bienestar</p>
                <ul>
                    <li>Sauna finlandés</li>
                    <li>Masajes Deportivos</li>
                    <li>Crioterapia</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="grupo">
        <div class="tarjeta2">
            <figure>
                <img src="<?=  base_url('imagenes/imagen2.jpg') ?>" alt="gym" title="Gym">
            </figure>
            <div>
                <h2>Ambiente Motivador</h2>
                <p>Espacios diseñados con iluminación LED inteligente que se adapta a tu entrenamiento</p>
            </div>
        </div>
        <div class="tarjeta2">
            <figure>
                <img src="<?= base_url('imagenes/imagen3.jpg') ?>" alt="gym2">
            </figure>
            <div>
                <h2>Equipamiento moderno</h2>
                <p>Màquinas para potenciar tus entrenamientos</p>
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>

    <!-- Scripts usados en la página -->
    <?= $this->section('script') ?>
        <script src="op1.js"></script>
    <?= $this->endSection() ?>
    
