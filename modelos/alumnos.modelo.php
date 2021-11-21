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
        $x = Conexion::conectar()->prepare("SELECT * FROM alumnos");
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
}