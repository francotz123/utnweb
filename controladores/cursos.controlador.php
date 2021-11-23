<?php

class ControladorCursos{
    public function getCursos(){
        return  ModeloCursos::getAllCursos();
    }
	public function getAlumnosCurso($idcursos){
        return  ModeloCursos::getAlumnosCurso($idcursos);
    }

	public function getOneCurso($idcursos){
		
        return  ModeloCursos::getOneCurso($idcursos);
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

	public function actualizarCurso(){

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
             if(isset($_POST["idcursos"])){
				$idcursos = $_POST["idcursos"];
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
                "idmaterias" => $idmaterias, 
				"idcursos" => $idcursos
			];
           
			$respuesta = ModeloCursos::updateCurso($itemsValores);
			if($respuesta){
				
				echo '<script>

				window.location = "cursos";

				</script>';
			 
				
			}
		}
	}


	public function agregarAlumnoCurso(){
		if(isset($_POST["idalumnos"]) || isset($_POST["idcurso"])){
			if(isset($_POST["idalumnos"])){
				$idalumnos = $_POST["idalumnos"];
			 }
             if(isset($_POST["idcurso"])){
				$idcurso = $_POST["idcurso"];
			 }

			 $itemsValores = [
				 "idcurso" => $idcurso , 
				 "idalumnos" => $idalumnos, 
			 ];

			$respuesta = ModeloCursos::insertAlumno($itemsValores);

			if($respuesta){
		
				echo '<script>

				window.location = "alumnosCurso-'.$idcurso.'";

				</script>';
			 
				
			}
		}

	}

	public function deleteCurso($id){
	
		$resultado =  ModeloCursos::deleteCursoDB($id);
		
		if($resultado){
			echo '<script>

			window.location = "cursos";

				</script>';
		}else{
			echo'<script> 
			var opcion = confirm("No se pudo borrar el curso '.$id.'.");
			window.location = "cursos";
			</script>';
		}
	}

	
	public function deleteAlumnoCurso($idalumno, $idcurso){
		$resultado =  ModeloCursos::deleteAlumnoCursoDB($idalumno, $idcurso);
		if($resultado){
			echo '<script>

			window.location = "alumnosCurso-'.$idcurso.'";

				</script>';
		}else{
			echo'<script> 
			var opcion = confirm("No se pudo borrar el alumno '.$idalumno.' del curso '. $idcurso.'.");
			window.location = "alumnosCurso-'.$idcurso.'";
			</script>';
		}
	}
}