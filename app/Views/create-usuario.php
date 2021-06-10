<?= $this->extend('layouts/layout') ?>


<?= $this->section('content') ?>
<div class="container-fluid">
<br><br>
    <div class="row align-items-start">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="mb-3">
                <h3>Módulo Nuevos Usuarios</h3>
                
                    <?php if(session('msg')){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php 
                        echo session('msg'); ?>
                        </div>
                        <?php
                    } ?>
                
            </div>
            <form method="post" action="<?=site_url('/guardarUsuario')?>">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?=old('correo')?>" placeholder="nombre@dominio.com" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="mínimo 8 caracteres" required>
               </div>
               <div class="mb-3">
                    <label for="pass2" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="pass2" name="pass2" required>
               </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?=old('nombre')?>" required>
               </div>
               <div class="mb-3">
                    <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?=old('apellido_paterno')?>" required>
               </div>
               <div class="mb-3">
                    <label for="apellido_materno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?=old('apellido_materno')?>" required>
               </div>
               <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="987654321" required>
               </div>
               <br>
               <div style="text-align:center;">
                    <button type="submit" class="btn btn-success mb-3">Agregar Usuario</button>
                </div>
            </form>
           
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?= $this->endSection() ?>