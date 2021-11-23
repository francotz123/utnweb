<?php

require_once "conexion.php";

Class ModeloAlumnos{
    
    static public function insertarAlumno($itemsValores){
      
        $x = Conexion::conectar()->prepare("INSERT INTO alumnos (idalumnos, nombre, dni, idusuario) VALUES (null, :nombre, :dni, :idusuario)");
    
        $x->bindParam(':nombre',$itemsValores["nombre"],PDO::PARAM_STR, 25);
        $x->bindParam(':dni',$itemsValores["dni"],PDO::PARAM_STR, 25);
        $x->bindParam(':idusuario',$itemsValores["usuarioid"],PDO::PARAM_STR, 25);
        return $x->execute();

   }

   static public function getAllAlumnos(){
    $x=Conexion::conectar()->prepare("SELECT a.idalumnos, CONCAT(a.nombre, ' - ', a.dni) as 'nombre' FROM alumnos a INNER JOIN usuarios u ON a.idusuario = u.idusuarios WHERE u.activo = 1");
    $x->execute();
    return $x->fetchAll();
    }

    static public function getAlumnoByUserID($id){
        $x = Conexion::conectar()->prepare("SELECT * FROM alumnos WHERE idusuario = :id");
        $x->execute([
            ':id' => $id
        ]);
        return $x->fetch();
    }

    static public function getAlumnosProfesorByID($id){
        $x = Conexion::conectar()->prepare(
            "SELECT a.*, c.nombre_curso AS 'curso'
            FROM profesores_cursos pc
            JOIN cursos c ON c.idcursos = pc.idcurso
            JOIN alumnos_cursos ac ON ac.idcurso = c.idcursos
            JOIN alumnos a ON a.idalumnos = ac.idalumno   
            WHERE pc.idprofesor = :id"
        );
        $x->execute([
            ':id' => $id
        ]);
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }
}