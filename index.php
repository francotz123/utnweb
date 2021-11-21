<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/roles.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/alumnos.controlador.php";
require_once "controladores/profesores.controlador.php";
require_once "controladores/materias.controlador.php";
require_once "controladores/cursos.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/roles.modelo.php";
require_once "modelos/alumnos.modelo.php";
require_once "modelos/profesores.modelo.php";
require_once "modelos/materias.modelo.php";
require_once "modelos/cursos.modelo.php";



$plantilla = new controladorPlantilla();
$plantilla -> ctrPlantilla();


