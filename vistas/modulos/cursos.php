<?php if(intval( $_SESSION['usuario']['idrol']) == 1) { 
  $cursos = new ControladorCursos();
  $cursos = $cursos -> getCursos();
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Cursos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Cursos</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Cursos</h3>
        <a href="editarCurso" title="Editar datos" class="btn btn-primary btn-sm">Nuevo</a>
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
					<th>Nombre Curso</th>
          <th>Año</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Profesor</th>
          <th>Materia</th>
          <th>Acciones</th>
				</tr>
				<?php
				if(sizeof($cursos) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{ 
					foreach ($cursos as $curso){ ?>
						<tr>
							<td><?php echo $curso["idcursos"] ?></td>
							<td><?php echo $curso["nombre_curso"] ?></td>
              <td><?php echo $curso["anio"] ?></td>
              <td><?php echo $curso["fecha_inicio"] ?></td>
              <td><?php echo $curso["fecha_fin"] ?></td>
              <td><?php echo $curso["profesor"] ?></td>
              <td><?php echo $curso["materia"] ?></td>
              <td>
                <a href="alumnosCurso-<?=$curso["idcursos"]?>" title="Alumnos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
								<a href="editarCurso-<?=$curso["idcursos"]?>" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="borrarCurso-<?=$curso["idcursos"]?>" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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