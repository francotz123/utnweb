<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 
    $edit = false;
    if($rutas[1] !== null){
        $edit = true;
        $materia = new ControladorMaterias();
        $materia = $materia -> getOneMateria(intval($rutas[1]));
    }
?>
<div class="content-wrapper">

  <section class="content-header">
  <?php if($edit) { ?>
    <h1>
        Editar Materia 
    </h1>
  <?php }else{ ?>
      <h1>
         Crear Materia 
      </h1>
  <?php } ?>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Editar Materia </li>
    
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
                  <label for="inputEmail4">Materia</label>
                  <?php if($edit) { ?>
                      <input type="text" class="form-control" name="nombreMateria" value="<?php echo$materia['nombreMateria']?>">
                  <?php }else { ?>
                      <input type="text" class="form-control" name="nombreMateria" placeholder="ingrese Nombre De Usuario">
                  <?php } ?>
                  </div>
                  <?php if($edit) { ?>
                    <input type="hidden" class="form-control" name="idmaterias" value= "<?php echo intval($rutas[1])?>">
                  <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>

            <?php
            $action = new ControladorMaterias();
             if($edit){
                $action -> actualizarMateria();
            }else{
              $action -> crearMateria();
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