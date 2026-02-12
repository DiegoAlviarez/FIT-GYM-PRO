<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts/plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> FitGymPro - Instructores </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?=  $this->section('contenido') ?>
    
    <!-- Descripción de los entrenadores del gimnasio-->
    <h1 class="titulo"> Nuestros Instructores</h1>
    <p class="texto">Profesionales certificados dedicados a ayudarte a alcanzar tus objetivos</p>

    <section class="grupo_Ins">
        <?php if (!empty($instructores)): ?>
            <?php foreach ($instructores as $instructor): ?>
                <label for="btn-descripcion" class="tarjeta-instructores1" data-descripcion="<?= esc($instructor['biografia']) ?>">
                    <figure>
                        <img src="<?= base_url('imagenes/' . ($instructor['foto'] ?: 'default.jpg')) ?>" alt="gym-instructor1" title="Gym">
                    </figure>
                    <div class="info">
                        <h2><?= esc($instructor['nombre']) ?></h2>
                        <h4><?= esc($instructor['especialidad']) ?></h4>
                        <p><?= esc($instructor['descripcion']) ?></p>
                        <p>
                            <i class="fa-solid fa-medal"></i><?= esc($instructor['experiencia']) ?> años de experiencia 
                        </p>
                        <div class="contenedor-tags">
                            <?php
                            $tags = explode(',', $instructor['certificaciones']);
                            foreach ($tags as $tag):
                                if (!empty(trim($tag))):
                            ?>
                                <span class="tag"><?= esc(trim($tag)) ?></span>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </label>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="texto">Próximamente anunciaremos a nuestro equipo de profesionales. </p>
        <?php endif; ?>
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
