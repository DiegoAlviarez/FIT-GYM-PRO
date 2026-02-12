<!-- Llamado a la plantilla que se está usando -->
<?= $this->extend('layouts/plantilla') ?> 

<!-- Título de la página -->
<?= $this->section('titulo') ?>
    <title> Gestión de Socios </title>
<?= $this->endSection() ?>

<!-- Contenido de la página -->
<?= $this->section('contenido') ?>
   
    <div class="content inscribir">
        <h2>Alumnos inscritos en: <?= $clase['nombre'] ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre del Alumno</th>
                    <th>Fecha de Inscripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumnos as $alumno): ?>
                <tr>
                    <td><?= esc($alumno['cedula'] ?? 'N/A') ?></td>
                    <td><?= esc($alumno['nombre'] ?? 'Socio no encontrado') ?></td>
                    <td><?= esc($alumno['fecha_inscripcion'] ?? 'Sin fecha') ?></td>

                    <td class="actions">
                        <a href="<?= base_url('clases/eliminar/' . $clase['id'] . '/' . $alumno['id_socio']) ?>" class="btn-eliminar" onclick="return confirm('¿Retirar al alumno');"> Eliminar </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cuerpo2">
            <div class="rgtr">
                <a href="<?= base_url('gestion/clases') ?>" class="btns-editar" > Regresar </a>
            </div>
        </div>
    </div>
    
    

<?= $this->endSection() ?>
