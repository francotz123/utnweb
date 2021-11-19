<?php

require_once "conexion.php";

Class ModeloUsuarios{

    static public function mdlMostrarUsuarios($tabla, $item, $valor){
        $x=Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = :$item");

        $x->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $x->execute();

        return $x->fetch();

    }

    static public function getAllUsers(){

        $x=Conexion::conectar()->prepare("SELECT usuarios.*, roles.tipo_rol FROM usuarios INNER JOIN roles WHERE usuarios.idrol = roles.idroles");
        $x->execute();
        return $x->fetchAll();
    }

    static public function getOneUser($item,$id){

        $x=Conexion::conectar()->prepare("SELECT * FROM usuarios where $item = :$item");
        $x->bindParam(":".$item,$id, PDO::PARAM_STR);
        $x->execute();
        return $x->fetch();

    }

    static public function updateUser($tabla, $itemsValores, $id){
    
        $x = Conexion::conectar()->prepare("UPDATE usuarios SET usuario=:usuario, password=:password, idrol=:idrol WHERE idusuarios=:idusuarios");
     
        $x->bindParam(':usuario',$itemsValores["usuario"],PDO::PARAM_STR, 25);
        $x->bindParam(':password',$itemsValores["password"],PDO::PARAM_STR, 25);
        $x->bindParam(':idrol',$itemsValores["idrol"],PDO::PARAM_STR, 25);
        $x->bindParam(':idusuarios',$itemsValores["idusuarios"],PDO::PARAM_STR, 25);
        return $x->execute();


       
    }

    static public function createUser($itemsValores){
    
     
         $x = Conexion::conectar()->prepare("INSERT INTO usuarios (idusuarios, usuario, password, idrol) VALUES (null, :usuario, :password, :idrol)");
     
         $x->bindParam(':usuario',$itemsValores["usuario"],PDO::PARAM_STR, 25);
         $x->bindParam(':password',$itemsValores["password"],PDO::PARAM_STR, 25);
         $x->bindParam(':idrol',$itemsValores["idrol"],PDO::PARAM_STR, 25);
         return $x->execute();

    }

    static public function deleteUserDB($id){
        $valor = 0;
        $x = Conexion::conectar()->prepare("UPDATE usuarios SET activo=:activo WHERE  idusuarios=:idusuarios");
        $x->bindParam(':activo', $valor,PDO::PARAM_STR, 25);
        $x->bindParam(':idusuarios',$id,PDO::PARAM_STR, 25);
        return $x->execute();

    }
}


