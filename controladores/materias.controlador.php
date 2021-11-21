<?php

class ControladorMaterias{
    public function getMaterias(){
        return  ModeloMaterias::getAllMaterias();
    }
    public function getOneMateria($id){
		return  ModeloMaterias::getOneMateria("idmaterias",$id);
	}

    public function actualizarMateria(){
        if(isset($_POST["nombreMateria"]) || isset($_POST["idmaterias"])){
			$respuesta = null;
			 if(isset($_POST["nombreMateria"])){
				$nombre = $_POST["nombreMateria"];
			 }

             if(isset($_POST["idmaterias"])){
				$id = $_POST["idmaterias"];
			 }

			$tabla = "materias";
			$itemsValores = [
				"nombreMateria" => $nombre,
                "id" => $id
			];
			$respuesta = ModeloMaterias::updateMateria($itemsValores);

			if($respuesta){
		
				echo '<script>

				window.location = "materias";

				</script>';
			 
				
			}
		}
    }

    public function crearMateria(){
		if(isset($_POST["nombreMateria"])){
			$respuesta = null;

			 if(isset($_POST["nombreMateria"])){
				$nombre = $_POST["nombreMateria"];
			 }

			$tabla = "materias";
			$itemsValores = [
				"nombreMateria" => $nombre 
			];
			$respuesta = ModeloMaterias::createMateria($itemsValores);

			if($respuesta){
		
				echo '<script>

				window.location = "materias";

				</script>';
			 
				
			}
		}
	}

}