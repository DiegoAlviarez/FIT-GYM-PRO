<?= $this->extend('layouts\plantilla') ?>
<?= $this->section('titulo') ?>
    <title> FitGymPro - Instructores </title>
<?= $this->endSection() ?>
<?=  $this->section('contenido') ?>
    
    <h1 class="titulo"> Nuestros Instructores</h1>
    <p class="texto">Profesionales certificados dedicados a ayudarte a alcanzar tus objetivos</p>

    <section class="grupo">
        <div class="tarjeta-instructores">
            <figure>
                <img src="<?= base_url('imagenes/instructor1.jpg') ?>" alt="gym-instructor1" title="Gym">
            </figure>
            <div class="info">
                <h2>Ana Rodríguez</h2>
                <h4>Entrenamiento Funcional</h4>
                <p>Especialista en desarrollo de fuerza y acondicionamiento físico.</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 8 años de experiencia 
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Certificación NSCA</span>
                    <span class="tag">CrossFit Nivel 2</span>
                    <span class="tag">Experto TRX</span>
                </div>
            </div>
        </div>
        <div class="tarjeta-instructores">
            <figure>
                <img src="<?= base_url('imágenes/instructor2.jpg') ?>" alt="gym-instructor2">
            </figure>
            <div class="info">
                <h2>Miguel Ángel Torres</h2>
                <h4>Bodybuilding</h4>
                <p>Competidor profesional y experto en hipertrofia muscular.</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 12 años de experiencia
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Profesional IFBB</span>
                    <span class="tag">Entrenados ISSA</span>
                    <span class="tag">Nutrición Deportiva</span>
                </div>
            </div>
        </div>
        <div class="tarjeta-instructores">
            <figure>
                <img src="<?= base_url('imágenes/instructor3.jpg') ?>" alt="gym-instructor3">
            </figure>
            <div class="info">
                <h2>Laura Martín</h2>
                <h4>Yoga Y Pilates</h4>
                <p>Maestra certificada enfocada en flexibilidad y bienestar integral.</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 10 años de experiencia
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Yoga RYT 500h</span>
                    <span class="tag">Pilates Integral</span>
                    <span class="tag">Instructora Barra</span>
                </div>
            </div>
        </div>
    </section>
    <section class="grupo">
        <div class="tarjeta-instructores">
            <figure>
                <img src="<?= base_url('imágenes/instructor4.jpg') ?>" alt="gym-instructor4">
            </figure>
            <div class="info">
                <h2>David Sánchez</h2>
                <h4>Spinning Y Cardio</h4>
                <p>Instructor dinámico especializado en resistencia cardiovascular.</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 6 años de experiencia
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Ciclismo Indoor</span>
                    <span class="tag">Resistencia</span>
                </div>
            </div>
        </div>
        <div class="tarjeta-instructores">
            <figure>
                <img src="<?= base_url('imágenes/instructor5.jpg') ?>" alt="gym-instructor5">
            </figure>
            <div class="info">
                <h2>Carmen López</h2>
                <h4>Natación</h4>
                <p>Ex-nadadora olímpica, ahora entrenadora de alto rendimiento.</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 15 años de experiencia
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Alto Rendimiento</span>
                    <span class="tag">Técnica de Nado</span>
                    <span class="tag">Salvavidas</span>
                </div>
            </div>
        </div>
        <div class="tarjeta-instructores">
            <figure>
                <img src="<?= base_url('imágenes/instructor6.jpg') ?>" alt="gym-instructor6">
            </figure>
            <div class="info">
                <h2>Roberto García</h2>
                <h4>Boxeo & MMA</h4>
                <p>Peleador profesional con pasión por enseñar defensa personal.</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 9 años de experiencia
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Cinturón Negro</span>
                    <span class="tag">Defensa Personal</span>
                    <span class="tag">Kickboxing</span>
                </div>
            </div>
        </div>
    </section>
    <div class="contenedor-transparente">
        <div class="centrado">
            <h3>¿Quieres entrenar con nuestros expertos?</h3>
            <p>Programa una sesión personalizada y lleva tu entrenamiento al siguiente nivel</p>
            <button class="reservar-btn"> Reservar Sesión </button>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->Section('scripts') ?>
    <script src="op2.js"></script>
<?= $this->endSection() ?>
