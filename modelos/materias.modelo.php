<?php

require_once "conexion.php";

Class ModeloMaterias{
    static public function getAllMaterias(){

        $x=Conexion::conectar()->prepare("SELECT * FROM materias");
        $x->execute();
        return $x->fetchAll();
    }

    static public function getOneMateria($item,$id){

        $x=Conexion::conectar()->prepare("SELECT * FROM materias where $item = :$item");
        $x->bindParam(":".$item,$id, PDO::PARAM_STR);
        $x->execute();
        return $x->fetch();

    }

    static public function createMateria($itemsValores){
    
        $x = Conexion::conectar()->prepare("INSERT INTO materias (idmaterias, nombreMateria) VALUES (null, :nombre)");
    
        $x->bindParam(':nombre',$itemsValores["nombreMateria"],PDO::PARAM_STR, 25);
        return $x->execute();

   }
   static public function updateMateria($itemsValores){

    $x = Conexion::conectar()->prepare("UPDATE  materias SET nombreMateria =:nombre WHERE idmaterias = :id");

    $x->bindParam(':nombre',$itemsValores["nombreMateria"],PDO::PARAM_STR, 25);
    $x->bindParam(':id',$itemsValores["id"],PDO::PARAM_STR, 25);

    return $x->execute();

    }

    static public function deleteMateriaDB($id){
        $x = Conexion::conectar()->prepare("DELETE FROM materias WHERE idmaterias=:idmaterias");
        $x->bindParam(':idmaterias',$id,PDO::PARAM_STR, 25);
        return $x->execute();
    }

    static public function getMateriasByAlumnoID($id){
        $x = Conexion::conectar()->prepare(
            "SELECT m.nombreMateria as 'materia', c.nombre_curso AS 'curso', p.nombre AS 'profesor'
            FROM alumnos_cursos 
            JOIN cursos c ON c.idcursos = alumnos_cursos.idcurso
            JOIN cursos_materias cm ON cm.idcurso = c.idcursos
            JOIN materias m ON m.idmaterias = cm.idmateria
            JOIN profesores_cursos pc ON pc.idcurso = c.idcursos
            JOIN profesores p ON p.idprofesores = pc.idprofesor
            WHERE alumnos_cursos.idalumno = :id"
        );
        $x->execute([
            ':id' => $id
        ]);
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }


}