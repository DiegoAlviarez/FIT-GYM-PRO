<?= $this->extend('layouts\plantilla') ?>
<?= $this->section('titulo') ?>
    <title> FitGymPro - login </title>
<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
    <div class="login">
        <div class="inicial">
            <i class="fa-solid fa-shield"></i>
            <h1>Panel de Administración</h1>
            <p>Acceso restringido solo personal autorizado</p>
        </div>
        <form method="POST" action="<?= base_url('panel/validar') ?>">
            <?= csrf_field(); ?>

            <div class="campo">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" placeholder="Ingresa tu usuario" name="usuario" required>
            </div>
            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Ingresa tu contraseña" name="password" required>
            </div>
        
            <?php if(session()->getFlashdata('error')): ?>
                <div>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="inicio">
                <input type="submit" value="Iniciar Sesión"/>
            </div>
        </form>        
    </div>
    
<?= $this->endSection() ?>


