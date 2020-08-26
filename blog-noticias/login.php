<?php
require_once "conexion.php";

if(isset($_POST)){
	if(isset($_POST)){

		if(isset($_SESSION["error_login"])){
			session_unset($_SESSION["error_login"]);
		}

		//Recoger datos del formulario
		$email=trim($_POST["email"]);
		$password=$_POST["password"];

		//Comprobar la contraseña / cifrar

	}

	//Consulta para comprobar al usuario
	$sql="SELECT * FROM usuarios WHERE email='$email';";
	$login = mysqli_query($db, $sql);

	if($login && mysqli_num_rows($login) == 1){
		$usuario= mysqli_fetch_assoc($login);

		//comprobar contraseña
		$verify=password_verify($password, $usuario["password"]);

		if($verify){
			//Guardar los datos del usuario en una sesion
			$_SESSION["usuario"]=$usuario;
		}else{
			$_SESSION["error_login"]="Login incorrecto";
		}
	}else{
		$_SESSION["error_login"]="Login incorrecto";
	}
	

	header("Location: index.php");




}



?>