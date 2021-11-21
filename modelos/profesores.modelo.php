<?php

require_once "conexion.php";

Class ModeloProfesores{
    static public function insertarProfesor($itemsValores){
 
        $x = Conexion::conectar()->prepare("INSERT INTO profesores (idprofesores, nombre, dni,profesion, idusuario) VALUES (null, :nombre, :dni,:profesion, :idusuario)");
    
        $x->bindParam(':nombre',$itemsValores["nombre"],PDO::PARAM_STR, 25);
        $x->bindParam(':dni',$itemsValores["dni"],PDO::PARAM_STR, 25);
        $x->bindParam(':profesion',$itemsValores["profesion"],PDO::PARAM_STR, 25);
        $x->bindParam(':idusuario',$itemsValores["usuarioid"],PDO::PARAM_STR, 25);
        return $x->execute();

   }

   static public function getAllProfesor(){
    $x=Conexion::conectar()->prepare("SELECT idprofesores, CONCAT(nombre, ' - ', dni) as 'nombre' FROM profesores  ");
    $x->execute();
    return $x->fetchAll();
    }
}