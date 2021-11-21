<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>UTN - Gestor</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="vistas/img/utn.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="vistas/dist/css/estilos.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">


  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/plantilla.min.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

  <?php
if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/
    $rutas = array();
    if(isset($_GET["ruta"])){
      $rt =  $_GET["ruta"];
      
      $rutas = explode("-", $rt); 
      
      if($rutas[0] == null ){
        $rutas[0] = $_GET["ruta"];
      }

      if($rutas[0] == "inicio" ||             
         $rutas[0] == "usuarios" ||
         $rutas[0] == "salir" || 
         $rutas[0] == "editarUsuario"|| 
         $rutas[0] == "cursos" ||
         $rutas[0] == "crearUsuario" ||
         $rutas[0] == "borrarUsuario" ||
         $rutas[0] == "crearAlumno" ||
         $rutas[0] == "crearProfesor" ||
         $rutas[0] == "materias" ||
         $rutas[0] == "editarMateria" ||
         $rutas[0] == "editarCurso" ||
         $rutas[0] == "misCursos")
       {

        include "modulos/".$rutas[0].".php";

      }else{
        include "modulos/404.php";
      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';
  }else{
    include "modulos/login.php";
  }

  

  ?>


<script src="vistas/js/plantilla.js"></script>

</body>
</html>
