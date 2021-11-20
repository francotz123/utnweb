<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 
    $edit = false;
    if($rutas[1] !== null){
        $edit = true;
        $user = new ControladorUsuarios();
        $userControler = $user -> getRolString($rutas[1]);
        $user = $user -> getOneUser(intval($rutas[1]));

    }


?>
<div class="content-wrapper">

  <section class="content-header">
  <?php if($edit) { ?>
    <h1>
        Editar Usuario 
    </h1>
  <?php }else{ ?>
      <h1>
         Crear Usuario 
      </h1>
  <?php } ?>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Editar Usuario </li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
         <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Usuario</label>
                <?php if($edit) { ?>
                    <input type="text" class="form-control" name="usuario" value="<?php echo$user['usuario']?>">
                <?php }else { ?>
                    <input type="text" class="form-control" name="usuario" placeholder="ingrese Nombre De Usuario">
                <?php } ?>
                </div>
                <?php if($edit) { ?>
                  <input type="hidden" class="form-control" name="idusuarios" value= "<?php echo intval($rutas[1])?>">
                <?php } ?>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Contraseña</label>
                    <?php if($edit) { ?>
                        <input type="password" class="form-control" name="password" value="<?php echo $user['password']?>">
                    <?php }else { ?>
                        <input type="password" class="form-control" name="password" placeholder="Ingrese Contraseña">
                    <?php } ?>
                    
                </div>
            </div>
            <?php if($edit) { ?>
              <div class="form-group col-md-6">
              <input type="text" class="form-control" name="password" value="<?php echo $userControler["tipo_rol"] ?>" disabled><br>
            </div>
            <?php }else { ?>
              <div class="form-row">
                <div class="form-group col-md-6"></div>
                    <label for="inputAddress2">Rol</label>
                    <select name="rol">
                    <option value="1">Administrador</option>
                    <option value="2" selected>Profesor</option>
                    <option value="3">Alumno</option>
                    </select>
                </div>
            </div>
            <?php } ?>

            <?php if($edit) { ?>
            <div class="form-group col-md-6"> 
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php }else { ?>
              <button type="submit" class="btn btn-primary">Guardar</button>
            <?php } ?>


            <?php
            $action = new ControladorUsuarios();
             if($edit){
                $action -> actualizarUsuario();
            }else{
              $action -> crearUsuario();
            }
              ?>
             </form>
           
     </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php } ?>