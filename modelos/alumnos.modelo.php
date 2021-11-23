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
}