<?php if(intval( $_SESSION['usuario']['idrol']) == 1) { 
    if($rutas[1] !== null){
        $alumnosCurso = new ControladorCursos();
        $curso = $alumnosCurso -> getOneCurso($rutas[1]);
        $alumnosCurso = $alumnosCurso -> getAlumnosCurso($rutas[1]);
    }
  
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Alumnos del Curso <?php echo $curso["nombre_curso"] ?>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Alumnos</h3>
        <a href="agregarAlumnosCurso-<?=$rutas[1]?>" title="Editar datos" class="btn btn-primary btn-sm">Agregar Alumno</a>
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
          <th>No</th>
		  <th>Nombre</th>
          <th>DNI</th>
          <th>Acciones</th>
				</tr>
				<?php
				if(sizeof($alumnosCurso) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{ 
					foreach ($alumnosCurso as $alumno){ ?>
						<tr>
							<td><?php echo $alumno["idalumnos"] ?></td>
							<td><?php echo $alumno["nombre"] ?></td>
              <td><?php echo $alumno["dni"] ?></td>
              <td>
                <a href="borrarAlumnoCurso-<?=$alumno["idalumnos"]?>-<?=$curso["idcursos"]?>" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
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