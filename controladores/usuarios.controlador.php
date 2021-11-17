<?php

class ControladorUsuarios{

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){
                   
					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["usuario"] = $respuesta;

					echo '<script>

						window.location = "inicio";

					</script>';
					
				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}else{
				echo '<br><div class="alert alert-info">Recuerda usar solo valores alfa-numericos</div>';

			}	

		}

	}


	public function getUsers(){
		return  ModeloUsuarios::getAllUsers();
	}

	public function getOneUser($id){
		return  ModeloUsuarios::getOneUser("idusuarios",$id);
	}

	public function actualizarUsuario(){

		if(isset($_POST["usuario"]) || isset($_POST["password"]) || isset($_POST["rol"])){
			$respuesta = null;

			 if(isset($_POST["usuario"])){
				$nombre = $_POST["usuario"];
			 }else{
				$nombre = $_SESSION['usuario']['usuario'];
			 }

			 if(isset($_POST["password"])){
				$pass = $_POST["password"];
			 }else{
				$pass = $_SESSION['usuario']['password'];
			 }

			 if(isset($_POST["rol"])){
				$rol = $_POST["rol"];
			 }else{
				$rol = $_SESSION['usuario']['idrol'];
			 }

			$id = $_POST["id"];

			$tabla = "usuarios";
			$itemsValores = [
				"usuario" => $nombre , 
				"password" => $pass, 
				"idrol" => $rol,
				"idusuarios" => $id
			];

			 $respuesta = ModeloUsuarios::updateUser($tabla, $itemsValores);

			 if($respuesta){
				echo "<script>alert({$respuesta});</script>";
			 }

		}
		
	}

}
	


