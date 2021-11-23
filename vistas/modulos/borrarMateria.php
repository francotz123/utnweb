<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 


if($rutas[1] !== null){

    if($rutas[1] !== "borrar"){
        echo'<script>

        var resultado = window.confirm("Estas seguro de borrar la materia nro '.$rutas[1].'?");
        if (resultado == true) {
            window.location = "borrarMateria-borrar-'.$rutas[1].'";
        } else { 
            window.location = "materias";
        }
        
        </script>';

    }else{
        
        $materia = new ControladorMaterias();
        $materia = $materia -> deleteMateria(intval($rutas[2]));
    }
        
     }
?>


<?php } ?>