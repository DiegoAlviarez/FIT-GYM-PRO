<?=  $this->extend('layouts\plantilla') ?>

<?= $this->section('titulo') ?>
    <title>Login | FitGymPro</title>
<?= $this->endSection() ?>
    
<?= $this->section('contenido') ?>
<div class="login">
        <div class="inicial">
            <i class="fa-solid fa-shield"></i>
            <h1>Panel de Administración</h1>
            <p>Acceso restringido solo personal autorizado</p>
        </div>
        <form action="<?= base_url('verificar') ?>" method="POST">
        
        <?= csrf_field() ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

            <div class="campo">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>" required placeholder="ejemplo@correo.com">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="********">
            </div>

            
            <button type="submit" class="inicio">Entrar al Sistema</button>
            
        </form>
</div>

<?= $this->endSection() ?>
