<?php

class Conexion{
    
    public static function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=proyectoutnweb", "root", "");
        return $link;
    }
}
