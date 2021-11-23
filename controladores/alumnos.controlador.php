<?php

class ControladorAlumnos{

    public function getAlumnos(){
        return ModeloAlumnos::getAllAlumnos();
    }
    public function crearAlumno(){
        if(isset($_POST["nombre"]) || isset($_POST["dni"]) || isset($_POST["idusuario"])){
            $nombre ="";
            $dni = "";
            $userid = "";
            if(isset($_POST["nombre"])){
				$nombre = $_POST["nombre"];
			 }
             if(isset($_POST["dni"])){
				$dni = $_POST["dni"];
			 }
             if(isset($_POST["idusuario"])){
				$userid = $_POST["idusuario"];
			 }
            $tabla = "alumnos";

			$itemsValores = [
				"nombre" => $nombre , 
				"dni" => $dni, 
				"usuarioid" => $userid,
			];
           
            $respuesta = ModeloAlumnos::insertarAlumno($itemsValores);
            
            if($respuesta){
                echo '<script>
   
                   window.location = "usuarios";
   
               </script>';
           
                  
            }
        }
    }

}