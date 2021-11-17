<?php if(intval( $_SESSION['usuario']['rol_id']) == 1) { 
  $users = new ControladorUsuarios();
  $users = $users -> getUsers();
?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Cursos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cursos</li>
    
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
          <th>No</th>
					<th>Nombre</th>
					<th>Usuario</th>
          <th>Rol</th>
          <th>Acciones</th>
				</tr>
				<?php
				if(sizeof($users) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{ 
					foreach ($users as $user){ ?>
						<tr>
							<td><?php echo $user["id"] ?></td>
							<td><?php echo $user["nombre"] ?></td>
							<td><?php echo $user["usuario"] ?></td>
              <td><?php echo $user["tipoRol"] ?></td>
              <td>
              <?php if(intval($user["id"]) !== 3 ) { ?>
								<a href="editarUsuario-<?=$user["id"]?>" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <a href="index.php?aksi=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              <?php } ?>
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