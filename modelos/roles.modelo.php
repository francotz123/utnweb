<?php

require_once "conexion.php";

Class ModeloRoles{

    static public function getTipoRol($id){
       
        $x=Conexion::conectar()->prepare("SELECT tipo_rol FROM roles where idroles = :id");
        $x->bindParam(":id",$id, PDO::PARAM_STR);
        $x->execute();
        return $x->fetch();
    }
}