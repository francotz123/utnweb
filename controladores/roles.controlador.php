<?php

class ControladorRoles{
    public function getNombreRol($idrol){
       $model = ModeloRoles::getTipoRol($idrol);
       $respuesta = $model["tipo_rol"];
        return $respuesta;
    }
}