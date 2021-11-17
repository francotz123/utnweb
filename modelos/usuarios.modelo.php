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

    static public function updateUser($tabla, $itemsValores){
        $setear = "";
        foreach($itemsValores as $key => $value){
            $setear += "{$key} = {$value},";
        }

        $setear = substr($setear, 0, -1);
    
        $x = Conexion::conectar()->prepare("UPDATE $tabla SET $setear");
        $x->execute();
        return $x->fetch();
    }
}


