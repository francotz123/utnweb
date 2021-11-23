<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 
    $edit = false;
    if($rutas[1] !== null){
   
        $edit = true;
        $curso = new ControladorCursos();
        $curso = $curso -> getOneCurso(intval($rutas[1]));
    }
    $materias = new ControladorMaterias();
    $materias = $materias -> getMaterias();

    $profesores = new ControladorProfesores();
    $profesores = $profesores -> getProfesores();
?>
<div class="content-wrapper">

  <section class="content-header">
  <?php if($edit) { ?>
    <h1>
        Editar Curso 
    </h1>
  <?php }else{ ?>
      <h1>
         Crear Curso 
      </h1>
  <?php } ?>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Editar Curso </li>
    
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
                <label for="inputEmail4">Nombre Curso</label>
                <?php if($edit) { ?>
                    <input type="text" class="form-control" name="nombreCurso" value="<?php echo$curso['nombre_curso']?>">
                <?php }else { ?>
                    <input type="text" class="form-control" name="nombreCurso" placeholder="ingrese Nombre Del Curso">
                <?php } ?>
                </div>
                <?php if($edit) { ?>
                  <input type="hidden" class="form-control" name="idusuarios" value= "<?php echo intval($rutas[1])?>">
                <?php } ?>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Año</label>
                    <?php if($edit) { ?>
                        <input type="number" class="form-control" name="anio" value="<?php echo $curso['anio']?>">
                    <?php }else { ?>
                        <input type="number" class="form-control" name="anio" placeholder="Ingrese Año">
                    <?php } ?>
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Fecha Inicio</label>
                <?php if($edit) { ?>
                    <input type="date" class="form-control" name="fechaInicio" value="<?php echo$curso['fecha_inicio']?>">
                <?php }else { ?>
                    <input type="date" class="form-control" name="fechaInicio" placeholder="ingrese Fecha Inicio">
                <?php } ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Fecha Fin</label>
                    <?php if($edit) { ?>
                        <input type="date" class="form-control" name="fechaFin" value="<?php echo$curso['fecha_fin']?>">
                    <?php }else { ?>
                        <input type="date" class="form-control" name="fechaFin"  placeholder="ingrese Fecha Inicio">
                    <?php } ?>
                </div>
                <?php if($edit) { ?>
                    <input type="hidden" class="form-control" name="idcursos" value= "<?php echo intval($rutas[1])?>">
                  <?php } ?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Profesor</label>
                <select name="idprofesores">
                <?php foreach ($profesores as $profesor){ ?>
                    <option value="<?php echo$profesor['idprofesores']?>"><?php echo$profesor['nombre']?></option>
                <?php } ?>
                </select>
                </div>
                <?php if($edit) { ?>
              <div class="form-group col-md-6">
              <label for="inputAddress">Materia</label>
              <input type="text" class="form-control" name="password" value="<?php echo$curso['materia']?>" disabled><br>
            </div>
            <?php }else { ?>
              <div class="form-group col-md-6">
                    <label for="inputAddress">Materia</label>
                    <select name="idmaterias">
                    <?php foreach ($materias as $materia){ ?>
                        <option value="<?php echo$materia['idmaterias']?>"><?php echo$materia['nombreMateria']?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <?php } ?>
                
            </div>

    
            <button type="submit" class="btn btn-primary">Guardar</button>



            <?php
            $action = new ControladorCursos();
             if($edit){
                $action -> actualizarCurso();
            }else{
                 $action -> crearCurso();
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