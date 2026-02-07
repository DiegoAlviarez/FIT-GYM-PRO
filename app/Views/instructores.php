<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> FitGymPro - Instructores </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?=  $this->section('contenido') ?>
    
    <!-- Descripción de los entrenadores del gimnasio-->
    <h1 class="titulo"> Nuestros Instructores</h1>
    <p class="texto">Profesionales certificados dedicados a ayudarte a alcanzar tus objetivos</p>

    <section class="grupo">
        <label for="btn-descripcion" class="tarjeta-instructores" data-descripcion="Texto skljsfhhfdhfjhsdjfh">
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
        </label>
        <label for="btn-descripcion" class="tarjeta-instructores" data-descripcion="Pgfvhfgfhgfdgdfgdfgdfh">
            <figure>
                <img src="<?= base_url('imagenes/instructor2.jpg') ?>" alt="gym-instructor2">
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
        </label>
        <label for="btn-descripcion" class="tarjeta-instructores" data-descripcion="jkhgkhgbnmbnjlik">
            <figure>
                <img src="<?= base_url('imagenes/instructor3.jpg') ?>" alt="gym-instructor3">
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
        </label>
    </section>
    <section class="grupo">
        <label for="btn-descripcion" class="tarjeta-instructores" data-descripcion="kgfsawfdfdgdfdsfd">
            <figure>
                <img src="<?= base_url('imagenes/instructor4.jpg') ?>" alt="gym-instructor4">
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
        </label>
        <label for="btn-descripcion" class="tarjeta-instructores" data-descripcion="vgxsfdsfhghjhgkhgkgh">
            <figure>
                <img src="<?= base_url('imagenes/instructor5.jpg') ?>" alt="gym-instructor5">
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
        </label>
        <label for="btn-descripcion" class="tarjeta-instructores" data-descripcion="ljkghvkiuyiugiig  fukfffu  gfhdgd">
            <figure>
                <img src="<?= base_url('imagenes/instructor6.jpg') ?>" alt="gym-instructor6">
            </figure>
            <div class="info">
                <h2>Roberto García</h2>
                <h4>Boxeo & MMA</h4>
                <p>Peleador profesional con pasión por enseñar defensa personal</p>
                <p>
                    <i class="fa-solid fa-medal"></i> 9 años de experiencia
                </p>
                <div class="contenedor-tags">
                    <span class="tag">Cinturón Negro</span>
                    <span class="tag">Defensa Personal</span>
                    <span class="tag">Kickboxing</span>
                </div>
            </div>
        </label>
    </section>

    <input type="checkbox" id="btn-descripcion">
    <div class="container-descripcion">
        <div class="content-descripcion">
            <p id="descripcionInstructores"></p>
            <div class="btn-cerrarDescripcion"> 
                <label for="btn-descripcion"> Cerrar </label>
            </div>
        </div>
    </div>

    
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/op2.js') ?>"> </script>
    <script src="<?= base_url('js/modal.js') ?>"></script>
<?= $this->endSection() ?>
