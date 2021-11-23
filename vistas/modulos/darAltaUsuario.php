<?php if(intval($_SESSION['usuario']['idrol']) == 1) { 


if($rutas[1] !== null){
    if($rutas[1] !== "alta"){
        echo'<script>

        var resultado = window.confirm("Estas seguro de dar de Alta al usuario nro '.$rutas[1].'?");
        if (resultado === true) {
            window.location = "darAltaUsuario-alta-'.$rutas[1].'";
        } else { 
            window.location = "usuarios";
        }
        
                </script>';

    }else{
        $user = new ControladorUsuarios();
        $user = $user -> altaUser(intval($rutas[2]));
    }
        
     }
?>


<?php } ?>