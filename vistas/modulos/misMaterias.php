<?php if(intval( $_SESSION['usuario']['idrol']) == 3) { 
  $materias = new ControladorMaterias();
  $alumnos = new ControladorAlumnos();
  $alumno = $alumnos->getAlumnoPorIDUsuario($_SESSION['usuario']['idusuarios']);
  $materias = $materias->getMateriasAlumno($alumno['idalumnos']);
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Mis Materias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Mis Materias</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Materias</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
      <table class="table table-striped table-hover">
        <tr>
            <th>Nombre</th>
            <th>Curso</th>
            <th>Profesor</th>
        </tr>
        <?php
        if(sizeof($materias) == 0){
            echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{ 
            foreach ($materias as $materia){ ?>
        <tr>
            <td><?php echo $materia["materia"] ?></td>
            <td><?php echo $materia["curso"] ?></td>
            <td><?php echo $materia["profesor"] ?></td>
        </tr>
                <?php }
            }
            ?>
	    </table>
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