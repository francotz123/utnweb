<?php

class ControladorProfesores{

    public function getProfesores(){
        return ModeloProfesores::getAllProfesor();
    }
    public function crearProfesor(){
        if(isset($_POST["nombre"]) || isset($_POST["dni"]) || isset($_POST["idusuario"])){
            $nombre ="";
            $dni = "";
            $userid = "";
            $profesion = "";
            if(isset($_POST["nombre"])){
				$nombre = $_POST["nombre"];
			 }
             if(isset($_POST["dni"])){
				$dni = $_POST["dni"];
			 }
             if(isset($_POST["profesion"])){
				$profesion = $_POST["profesion"];
			 }
             if(isset($_POST["idusuario"])){
				$userid = $_POST["idusuario"];
			 }
            $tabla = "profesores";

			$itemsValores = [
				"nombre" => $nombre , 
				"dni" => $dni, 
				"usuarioid" => $userid,
                "profesion" => $profesion
			];
           
            $respuesta = ModeloProfesores::insertarProfesor($itemsValores);
            
            if($respuesta){
                echo '<script>
   
                   window.location = "usuarios";
   
               </script>';
           
                  
            }
        }
    }

}