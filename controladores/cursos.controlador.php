<?php

class ControladorCursos{
    public function getCursos(){
        return  ModeloCursos::getAllCursos();
    }

	public function getCursosAlumno($id){
		return ModeloCursos::getAllCursosAlumnoByID($id);
	}

    public function crearCurso(){
		if(isset($_POST["nombreCurso"]) || isset($_POST["anio"]) || isset($_POST["fechaInicio"]) || isset($_POST["fechaFin"]) || isset($_POST["idprofesores"]) || isset($_POST["idmaterias"])){
			$respuesta = null;

			 if(isset($_POST["nombreCurso"])){
				$nombre = $_POST["nombreCurso"];
			 }
             if(isset($_POST["anio"])){
				$anio = $_POST["anio"];
			 }
             if(isset($_POST["fechaInicio"])){
				$fechaInicio = $_POST["fechaInicio"];
			 }
             if(isset($_POST["fechaFin"])){
				$fechaFin = $_POST["fechaFin"];
			 }
             if(isset($_POST["idprofesores"])){
				$idprofesores = $_POST["idprofesores"];
			 }
             if(isset($_POST["idmaterias"])){
				$idmaterias = $_POST["idmaterias"];
			 }
			$tabla = "cursos";

			$itemsValores = [
				"nombreCurso" => $nombre,
                "anio" => $anio,
                "fechaInicio" => $fechaInicio,
                "fechaFin" => $fechaFin,
                "idprofesores" =>$idprofesores, 
                "idmaterias" => $idmaterias
			];
           
			$respuesta = ModeloCursos::createCurso($itemsValores);

			if($respuesta){
		
				echo '<script>

				window.location = "cursos";

				</script>';
			 
				
			}
		}
	}
}