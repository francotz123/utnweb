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

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"] && $respuesta["activo"] == 1){
					
                   
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

	public function getUserIdName($usuario){
		return  ModeloUsuarios::getIdForUser("usuario",$usuario);
	}

	public function getRolString($id){
		return  ModeloUsuarios::getRolString("idusuarios",$id);
	}

	public function actualizarUsuario(){
		
		if(isset($_POST["usuario"]) || isset($_POST["password"]) || isset($_POST["rol"])){
			if (!strpos($_POST["usuario"], " ")){
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

				$id = $_POST["idusuarios"];

				$tabla = "usuarios";
				$itemsValores = [
					"usuario" => $nombre , 
					"password" => $pass, 
					"idrol" => $rol,
					"idusuarios" => $id
				];

				$respuesta = ModeloUsuarios::updateUser($tabla, $itemsValores, $id);
				if($respuesta){
					echo '<script>

							window.location = "usuarios";

						</script>';
				}
			}else{
				echo'<script> 
					var opcion = confirm("El nombre de usuario no puede contener espacios.");
					window.location = "editarUsuario-'.$_POST["idusuarios"].'";
					</script>';
			}
		}
	}

	public function crearUsuario(){
		if(isset($_POST["usuario"]) || isset($_POST["password"]) || isset($_POST["rol"])){

			if (!strpos($_POST["usuario"], " ")){
				$existeNombre =  ModeloUsuarios::getIdForUser("usuario",$_POST["usuario"]);

				if(empty($existeNombre["idusuarios"])){
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
	
	
					$tabla = "usuarios";
					$itemsValores = [
						"usuario" => $nombre , 
						"password" => $pass, 
						"idrol" => $rol,
					];
					$rolContructor = new ControladorRoles();
					$tiporol = $rolContructor -> getNombreRol($rol);
	
					$respuesta = ModeloUsuarios::createUser($itemsValores);
	
					if($respuesta){
						$user = ModeloUsuarios::getIdForUser("usuario",$nombre);
					if( $tiporol == "Alumno"){
						echo '<script>
	
						window.location = "crearAlumno-'.$user["idusuarios"].'";
	
					</script>';
				
					}else if( $tiporol == "Profesor"){
						echo '<script>
	
						window.location = "crearProfesor-'.$user["idusuarios"].'";
	
						</script>';
					}else{
						echo '<script>
	
						window.location = "usuarios";
	
						</script>';
					}
						
					}
				}else{
					echo'<script> 
					var opcion = confirm("No se pudo crear el usuario. Nombre de usuario ya existe.");
				
					</script>';
				}
	
			}else{
				echo'<script> 
					var opcion = confirm("El nombre de usuario no puede contener espacios.");
				
					</script>';
			}
		}
	}
	
	public function deleteUser($id){
		$resultado =  ModeloUsuarios::deleteUserDB($id);

		if($resultado){
			echo '<script>

			window.location = "usuarios";

				</script>';
		}else{
			echo '<script>
			var opcion = confirm("No se pudo dar de baja al usuario '.$id.'.");
			window.location = "usuarios";
			</script>';
		}
	}

	public function altaUser($id){
		$resultado =  ModeloUsuarios::altaUserDB($id);
		if($resultado){
			echo '<script>

			window.location = "usuarios";

				</script>';
		}else{
			echo '<script>
			var opcion = confirm("No se pudo dar de alta al usuario '.$id.'.");
			window.location = "usuarios";
			</script>';
		}
	}

	public function getCursosAlumno($id){
		return ModeloCursos::getAllCursosAlumnoByID($id);
	}
}
	


