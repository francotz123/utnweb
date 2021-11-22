<?php

require_once "conexion.php";

Class ModeloCursos{
    static public function getAllCursos(){

        $x=Conexion::conectar()->prepare("SELECT c.*, p.nombre as 'profesor', m.nombreMateria as 'materia'  FROM cursos c INNER JOIN profesores_cursos pc ON c.idcursos = pc.idcurso 
        INNER JOIN profesores p ON pc.idprofesor = p.idprofesores INNER JOIN cursos_materias cm ON c.idcursos = cm.idcurso INNER JOIN materias m ON cm.idmateria = m.idmaterias ");
        $x->execute();
        return $x->fetchAll();
    }

    static public function getAllCursosAlumnoByID($id){
        $x = Conexion::conectar()->prepare(
            "SELECT c.*, p.nombre AS 'profesor', m.nombreMateria as 'materia'
            FROM alumnos_cursos 
            JOIN cursos c ON c.idcursos = alumnos_cursos.idcurso
            JOIN profesores_cursos pc ON pc.idcurso = c.idcursos
            JOIN profesores p ON p.idprofesores = pc.idprofesor
            JOIN cursos_materias cm ON cm.idcurso = c.idcursos
            JOIN materias m ON m.idmaterias = cm.idmateria 
            WHERE alumnos_cursos.idalumno = :id"
        );
        $x->execute([
            ':id' => $id
        ]);
        return $x->fetchAll(PDO::FETCH_ASSOC);
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

   static public function getUltimoID(){
    $x = Conexion::conectar()->prepare("SELECT idcursos FROM cursos ORDER BY idcursos DESC LIMIT 1");
    $resultado = $x->execute();
    $resultado = $x->fetch();
    return $resultado["idcursos"];
   }

}