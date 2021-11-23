<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 


if($rutas[1] !== null){
 
    if($rutas[1] !== "borrar"){
        echo'<script>

        var resultado = window.confirm("Estas seguro de borrar el alumno nro '.$rutas[1].' del curso nro '.$rutas[2].'?");
        if (resultado == true) {
            window.location = "borrarAlumnoCurso-borrar-'.$rutas[1].'-'.$rutas[2].'";
        } else { 
            window.location = "cursos";
        }
        
        </script>';

    }else{

        $curso = new ControladorCursos();
        $curso = $curso -> deleteAlumnoCurso($rutas[2],$rutas[3]);
    }
        
}
?>


<?php } ?>