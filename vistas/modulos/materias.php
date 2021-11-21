<?php if(intval( $_SESSION['usuario']['idrol']) == 1) { 
  $materias = new ControladorMaterias();
  $materias = $materias -> getMaterias();
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Materias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Materias</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Materias</h3>
        <a href="editarMateria" title="Editar datos" class="btn btn-primary btn-sm">Nuevo</a>
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
					<th>Nombre Materia</th>
          <th>Acciones</th>
				</tr>
				<?php
				if(sizeof($materias) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{ 
					foreach ($materias as $materia){ ?>
						<tr>
							<td><?php echo $materia["idmaterias"] ?></td>
							<td><?php echo $materia["nombreMateria"] ?></td>
              <td>
								<a href="editarMateria-<?=$materia["idmaterias"]?>" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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