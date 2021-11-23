<?php if(intval($_SESSION['usuario']['idrol']) == 2) { 
    $alumnos = new ControladorAlumnos();
    $profesores = new ControladorProfesores();
    $profesor = $profesores->getProfesorPorIDUsuario($_SESSION['usuario']['idusuarios']);
    $alumnos =  $alumnos->getAlumnosProfesor($profesor['idprofesores']);
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Mis Alumnos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Mis Cursos</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Cursos</h3>
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
					<th>Nombre Del Alumno</th>
          <th>DNI</th>
          <th>Curso al que asiste</th>
				</tr>
				<?php
				if(sizeof($alumnos) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{ 
					foreach ($alumnos as $alumno){ ?>
						<tr>
							<td><?php echo $alumno["nombre"] ?></td>
							<td><?php echo $alumno["dni"] ?></td>
							<td><?php echo $alumno["curso"] ?></td>
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