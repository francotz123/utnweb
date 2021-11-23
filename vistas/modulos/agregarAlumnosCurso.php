<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 

if($rutas[1] !== null){
    $idCurso = $rutas[1];
    $alumnos = new ControladorAlumnos();
    $alumnos = $alumnos -> getAlumnos();
   
}


?>
<div class="content-wrapper">

<section class="content-header">
<h1>
    Agregar Alumno 
</h1>

<ol class="breadcrumb">
  
  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  
  <li class="active">Agregar Alumno </li>

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
                <label for="inputEmail4">Seleccionar Alumno</label>
                <select name="idalumnos">
                <?php foreach ($alumnos as $alumno){ ?>
                  
                    <option value="<?php echo$alumno['idalumnos']?>"><?php echo $alumno['nombre']?></option>
                <?php } ?>
                </select>
                <input type="hidden" class="form-control" name="idcurso" value= "<?php echo intval($rutas[1])?>">
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <?php
        $action = new ControladorCursos();
        $action -> agregarAlumnoCurso();
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