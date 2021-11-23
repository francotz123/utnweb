<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 


if($rutas[1] !== null){

    if($rutas[1] !== "borrar"){
        echo'<script>

        var resultado = window.confirm("Estas seguro de borrar el curso nro '.$rutas[1].'?");
        if (resultado == true) {
            window.location = "borrarCurso-borrar-'.$rutas[1].'";
        } else { 
            window.location = "cursos";
        }
        
        </script>';

    }else{
        $curso = new ControladorCursos();
        $curso = $curso -> deleteCurso(intval($rutas[2]));
    }
        
     }
?>


<?php } ?>