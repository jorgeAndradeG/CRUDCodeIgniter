<?= $this->extend('layouts/layout') ?>


<?= $this->section('content') ?>

<br><br>
<div class="container-fluid">
    <div class="row align-items-start">
        <div class="col-2"></div>
        <div class="col-8">
    <?php if(isset($msg)): echo $msg; ?>
    <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Correo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr>
                        <td><?= $usuario['correo']; ?></td>
                        <td><?= $usuario['nombre']; ?></td>
                        <td><?= $usuario['apellido_paterno']; ?></td>
                        <td><?= $usuario['apellido_materno']; ?></td>
                        <td><a href="<?=base_url('index.php/editUsuario/'. $usuario['correo']);?>" type="button" class="btn btn-success"><i class="far fa-edit"></i></a></td>
                        <?php if($usuario['es_admin'] != 1): ?>
                            <td><a href="<?=base_url('index.php/deleteUsuario/'. $usuario['correo']);?>" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
                        <?php endif ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?= $this->endSection() ?>
