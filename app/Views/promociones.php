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
    <section class="grupo_Ins">
        <?php if(!empty($promociones)): ?>
            <?php foreach($promociones as $promocion): ?>
                <div class="tarjeta contenedor-tarjeta-<?= esc($promocion['color_clase']) ?>">
                    <div class="cabecera <?= esc($promocion['color_clase']) ?>">
                        <i class="<?= esc($promocion['icono']) ?>"></i>
                    </div>
                    <div class="contenido">
                        <h2><?= esc($promocion['titulo']) ?></h2>
                        <p class="descuento"> <?= esc($promocion['subtitulo']) ?></p>
                        <div>
                            <span class="pvp-actual"> <?= esc($promocion['precio_actual']) ?>  </span>
                            <?php if(!empty($promocion['precio_anterior'])): ?>
                                <span class="pvp-anterior"> <?= esc($promocion['precio_anterior']) ?> </span>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($promocion['ahorro'])): ?>
                            <p class="ahorro"> <?= esc($promocion['ahorro']) ?></p>
                        <?php endif; ?>
                        <p class="validez"> <?= esc($promocion['validez']) ?></p>
                        <label for="btn-prom"  class="btn-<?= esc($promocion['color_clase']) ?>"> Obtener Promoción </label>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="texto"> Por el momento no hay promociones acivas</p>
        <?php endif; ?>
        

        <input type="checkbox" id="btn-prom">
        <div class="container-descripcion">
            <div class="content-descripcion">
                <h2>Activa la Promoción</h2>
                <p>Comunicáte con nosotros y forma parte de nuestra familia. +414 - 4436461</p>
                <div class="btn-cerrarDescripcion">
                    <label for="btn-prom"> Cerrar </label>
                </div>
            </div>
        </div>

    </section>
    
<?= $this->endSection() ?>

<!-- Script usado en la página -->
<?= $this->section('script') ?>
    <script src="<?= base_url('js/op3.js') ?>"></script>    
<?= $this->endSection() ?>
