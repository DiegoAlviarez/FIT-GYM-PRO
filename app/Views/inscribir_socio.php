<?= $this->extend('layouts/plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Inscripción de clases </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>


    <div id="content-reg" class="inscribir">

            <h2>Inscribir Socio</h2>
            <p> <?= esc($socio['nombre']) ?></p>

            <form action="<?= base_url('socios/inscribir') ?>" method="POST">
                <!-- Token de Seguridad -->
                <?= csrf_field() ?>
                <!--Se manda el id -->
                <input type="hidden" name="id_socio" value="<?= $socio['id'] ?>">

                <div class="cuerpo2">
                    <div class="campo2">
                        <label for="id_clase">Selecciona la Clase:</label>
                        <select name="id_clase" id="id_clase" required>
                            <option value=""> Opciones</option>
                            <?php foreach($clases as $clase): ?>
                                <option value="<?= $clase['id'] ?>">
                                    <?= esc($clase['nombre']) ?> - <?= esc($clase['horario']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="rgtr-edit">
                        <input class="btns-editar" type="submit" value="Confirmar Inscripción"/>
                        <a href="<?= base_url('gestion') ?>" class="btns-editar" onclick="return confirm('¿Seguro que desea retroceder? No se guardaran los cambios')"> Regresar </a>
                    </div>
                </div>
            </form>

            
    </div>
<?= $this->endSection() ?>
