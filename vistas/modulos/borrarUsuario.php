<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 


if($rutas[1] !== null){
    if($rutas[1] !== "borrar"){
        echo'<script>

        var resultado = window.confirm("Estas seguro de borrar el usuario nro '.$rutas[1].'?");
        if (resultado === true) {
            window.location = "borrarUsuario-borrar-'.$rutas[1].'";
        } else { 
            window.location = "usuarios";
        }
        
                </script>';

    }else{
        $user = new ControladorUsuarios();
        $user = $user -> deleteUser(intval($rutas[2]));
    }
        
     }
?>


<?php } ?>