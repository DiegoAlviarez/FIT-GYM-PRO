<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts\plantilla') ?>

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> FitGymPro - login </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
    <div class="login">

        <!-- Encabezado de la página -->
        <div class="inicial">
            <i class="fa-solid fa-shield"></i>
            <h1>Panel de Administración</h1>
            <p>Acceso restringido solo personal autorizado</p>
        </div>

        <!-- Formulario de inicio de sesión -->
        <form method="POST" action="<?= base_url('panel/validar') ?>">

        <!-- Token de seguridad -->
            <?= csrf_field(); ?>

            <div class="campo">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" placeholder="Ingresa tu usuario" name="usuario" required>
            </div>
            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Ingresa tu contraseña" name="password" required>
            </div>
            
        <!-- Mensajes de errores en las validaciones(No cumplen las reglas que pone el validador)-->
            <?php if (session()->getFlashdata('errors')): ?>
                <div>
                    <ul>
                    <?php foreach (session()->getFlashdata('errors')as $error): ?> 
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
        <!-- Mensaje de datos incorrectos -->
            <?php if(session()->getFlashdata('error')): ?>
                <div>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

        <!-- Botón para entrar -->
            <div class="inicio">
                <input type="submit" value="Iniciar Sesión"/>
            </div>
        </form>        
    </div>
    
<?= $this->endSection() ?>


