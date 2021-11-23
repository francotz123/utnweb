<?php

require_once "conexion.php";

Class ModeloCursos{
    static public function getAllCursos(){

        $x=Conexion::conectar()->prepare("SELECT c.*, p.nombre as 'profesor', m.nombreMateria as 'materia'  FROM cursos c INNER JOIN profesores_cursos pc ON c.idcursos = pc.idcurso 
        INNER JOIN profesores p ON pc.idprofesor = p.idprofesores INNER JOIN cursos_materias cm ON c.idcursos = cm.idcurso INNER JOIN materias m ON cm.idmateria = m.idmaterias ");
        $x->execute();
        return $x->fetchAll();
    }

    static public function getOneCurso($idcursos){
       
        $x=Conexion::conectar()->prepare("SELECT c.*, p.nombre as 'profesor', m.nombreMateria as 'materia'  FROM cursos c INNER JOIN profesores_cursos pc ON c.idcursos = pc.idcurso 
        INNER JOIN profesores p ON pc.idprofesor = p.idprofesores INNER JOIN cursos_materias cm ON c.idcursos = cm.idcurso INNER JOIN materias m ON cm.idmateria = m.idmaterias WHERE c.idcursos = :idcursos");
        $x->bindParam(':idcursos',$idcursos,PDO::PARAM_STR, 25);
        $x->execute();
        return $x->fetch();
    }

    static public function getAlumnosCurso($idcursos){

        $x=Conexion::conectar()->prepare("SELECT a.* FROM alumnos a INNER JOIN alumnos_cursos ac ON a.idalumnos = ac.idalumno INNER JOIN usuarios u ON a.idusuario = u.idusuarios WHERE ac.idcurso = :idcursos AND u.activo = 1");
        $x->bindParam(':idcursos',$idcursos,PDO::PARAM_STR, 25);
        $x->execute();
        return $x->fetchAll();
    }


    static public function createCurso($itemsValores){
        
        $resultado1 = false;
       
        $x = Conexion::conectar()->prepare("INSERT INTO cursos (idcursos, nombre_curso, anio, fecha_inicio,fecha_fin ) VALUES (null, :nombrecurso, :anio, :fecha_inicio, :fecha_fin)");
    
        $x->bindParam(':nombrecurso',$itemsValores["nombreCurso"],PDO::PARAM_STR, 25);
        $x->bindParam(':anio',$itemsValores["anio"],PDO::PARAM_STR, 25);
        $x->bindParam(':fecha_inicio',$itemsValores["fechaInicio"],PDO::PARAM_STR, 25);
        $x->bindParam(':fecha_fin',$itemsValores["fechaFin"],PDO::PARAM_STR, 25);
        $resultado = $x->execute();
      
        if($resultado){
            $respuesta = ModeloCursos::insertProfesorCurso($itemsValores["idprofesores"]);
            if($respuesta){
                $respuesta = ModeloCursos::insertMateriaCurso($itemsValores["idmaterias"]);
                if( $respuesta){
                    $respuesta1 = $respuesta;
                }
            }
        }

        return $respuesta1;

   }

   static public function updateCurso($itemsValores){

    $resultado1 = false;
   
    $x = Conexion::conectar()->prepare("UPDATE cursos SET nombre_curso = :nombrecurso, anio=:anio, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin WHERE idcursos=:idcursos");

    $x->bindParam(':nombrecurso',$itemsValores["nombreCurso"],PDO::PARAM_STR, 25);
    $x->bindParam(':anio',$itemsValores["anio"],PDO::PARAM_STR, 25);
    $x->bindParam(':fecha_inicio',$itemsValores["fechaInicio"],PDO::PARAM_STR, 25);
    $x->bindParam(':fecha_fin',$itemsValores["fechaFin"],PDO::PARAM_STR, 25);
    $x->bindParam(':idcursos',$itemsValores["idcursos"],PDO::PARAM_STR, 25);

    $resultado = $x->execute();
   
    if($resultado){
        $resultado = ModeloCursos::updateProfesorCurso($itemsValores["idprofesores"], $itemsValores["idcursos"]);
    }

    return $resultado;

}

static public function updateProfesorCurso($idProfesor, $idCurso){
   
    $x = Conexion::conectar()->prepare("UPDATE profesores_cursos SET idprofesor=:idprofesor WHERE idcurso=:idcurso");

    $x->bindParam(':idcurso',$idCurso,PDO::PARAM_STR, 25);
    $x->bindParam(':idprofesor',$idProfesor,PDO::PARAM_STR, 25);

    return $x->execute();
   }

   static public function insertProfesorCurso($idProfesor){
   
    $idCurso  = ModeloCursos::getUltimoID();
  
    $x = Conexion::conectar()->prepare("INSERT INTO profesores_cursos (idcurso,idprofesor ) VALUES (:idcurso, :idprofesor)");

    $x->bindParam(':idcurso',$idCurso,PDO::PARAM_STR, 25);
    $x->bindParam(':idprofesor',$idProfesor,PDO::PARAM_STR, 25);

    return $x->execute();
   }

   static public function insertMateriaCurso($idmaterias){
   
    $idCurso  = ModeloCursos::getUltimoID();
    $x = Conexion::conectar()->prepare("INSERT INTO cursos_materias (idcurso,idmateria) VALUES ( :idcurso, :idmaterias)");
    $x->bindParam(':idcurso',$idCurso,PDO::PARAM_STR, 25);
    $x->bindParam(':idmaterias',$idmaterias,PDO::PARAM_STR, 25);

    return  $x->execute();

   }

   static public function insertAlumno($itemsValores){
   
    $idCurso  = ModeloCursos::getUltimoID();
    $x = Conexion::conectar()->prepare("INSERT INTO alumnos_cursos (idalumno,idcurso) VALUES ( :idalumno, :idcurso)");
    $x->bindParam(':idalumno',$itemsValores["idalumnos"],PDO::PARAM_STR, 25);
    $x->bindParam(':idcurso',$itemsValores["idcurso"],PDO::PARAM_STR, 25);

    return  $x->execute();

   }

   static public function getUltimoID(){
    $x = Conexion::conectar()->prepare("SELECT idcursos FROM cursos ORDER BY idcursos DESC LIMIT 1");
    $resultado = $x->execute();
    $resultado = $x->fetch();
    return $resultado["idcursos"];
   }

   static public function deleteCursoDB($id){
        $resultado =  ModeloCursos::deleteExtrasFromCursoDB($id);
        if($resultado){
            $x = Conexion::conectar()->prepare("DELETE FROM cursos WHERE idcursos=:idcursos");
            $x->bindParam(':idcursos',$id,PDO::PARAM_STR, 25);
            return $x->execute();
        }else{
            return false;
        }
    }

    static public function deleteExtrasFromCursoDB($id){
        $resultado1= false;
        $resultado2 = false;
        $resultado3 = false;
        $x = Conexion::conectar()->prepare("DELETE FROM alumnos_cursos WHERE idcurso=:idcurso");
        $x->bindParam(':idcurso',$id,PDO::PARAM_STR, 25);
        $resultado1 = $x->execute();
        if($resultado1){
            $x = Conexion::conectar()->prepare("DELETE FROM profesores_cursos WHERE idcurso=:idcurso");
            $x->bindParam(':idcurso',$id,PDO::PARAM_STR, 25);
            $resultado2 = $x->execute();
            if($resultado2){
                $x = Conexion::conectar()->prepare("DELETE FROM cursos_materias WHERE idcurso=:idcurso");
                $x->bindParam(':idcurso',$id,PDO::PARAM_STR, 25);
                $resultado3 = $x->execute();
            }
        }
        return ($resultado1 && $resultado2 && $resultado3);
    }

    
    static public function deleteAlumnoCursoDB($idalumno, $idcurso){
        $x = Conexion::conectar()->prepare("DELETE FROM alumnos_cursos WHERE idcurso=:idcurso AND idalumno= :idalumno");
        $x->bindParam(':idcurso',$idcurso,PDO::PARAM_STR, 25);
        $x->bindParam(':idalumno',$idalumno,PDO::PARAM_STR, 25);
        return $x->execute();
    }


}