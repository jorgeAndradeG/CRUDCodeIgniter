<?php 	if(session('es_admin') == '1'){
$this->extend('layouts/layout');
}
if(session('es_admin') == '0')
{
    $this->extend('layouts/layout-noadmin');
}
?>


<?= $this->section('content') ?>
<div class="container-fluid">
<br><br>
    <div class="row align-items-start">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="mb-3">
                <h3>Cambiar Contraseña</h3>

                <?php if(session('msg')){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php 
                        echo session('msg'); ?>
                        </div>
                        <?php
                    } ?>
            </div>
            <form method="post" action="<?=site_url('/updatePassword')?>">
              
                <input type="hidden" name="correo" value="<?=$usuario['correo']?>"">
                
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="mínimo 8 caracteres" required>
               </div>
               <div class="mb-3">
                    <label for="pass2" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="pass2" name="pass2" required>
               </div>

               <br>

               <div style="text-align:center;">
                    <button type="submit" class="btn btn-success mb-3">Cambiar Contraseña</button>
                </div>
            </form>
           
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?= $this->endSection() ?>
