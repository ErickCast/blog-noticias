<?php
if(isset($_POST)){
	require_once "conexion.php";

	$nombre=isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
	$apellidos=isset($_POST["apellidos"]) ? mysqli_real_escape_string($db, $_POST["apellidos"]) : false;
	$email = isset($_POST["email"]) ? trim($_POST["email"]) : false;
	$password = isset($_POST["password"]) ? $_POST["password"] : false;


	//Validar formulario
	$errores = array();

	if(empty($nombre) && is_numeric($nombre) && preg_match("/[0-9]/", $nombre)){
		$errores["nombre"] = "Introduce un nombre valido";
	}
	if(empty($apellidos) && is_numeric($apellidos) && preg_match("/[0-9]/", $apellidos)){
		$errores["apellidos"] = "Introduce apellidos validos";
	}
	if(empty($email)){
		$errores["email"]="Este campo no puede quedar vacio";
	}

	if(empty($password)){
		$errores["password"]="Este campo no puede quedar vacio";
	}



	if(count($errores)==0){
		$usuario=$_SESSION["usuario"];

		//Comprobar si el email ya existe
		$sql="SELECT id, email FROM usuarios WHERE email='$email'";
		$email_existente=mysqli_query($db, $sql);

		$usuario_existente=mysqli_fetch_assoc($email_existente);

		if($usuario_existente["id"]==$usuario["id"] || empty($usuario_existente)){

			//Actualizar usuario en la db
			$usuario=$_SESSION["usuario"];
			$sql="UPDATE usuarios SET ".
			"nombre = '$nombre', " .
			"apellidos= '$apellidos', ".
			"email= '$email', ".
			"password='$password', ".
			"WHERE id= ". $usuario["id"];
			$guardar= mysqli_query($db, $sql);


			if($guardar){
				$_SESSION["usuario"]["nombre"] = $nombre;
				$_SESSION["usuario"]["apellidos"]=$apellidos;
				$_SESSION["usuario"]["email"]=$email;
				$_SESSION["usuario"]["password"]=$password;
				$_SESSION["completado"]="Tus datos se han actualizado con exito.";
			}else{
				$_SESSION["errores"]["general"]="Ha ocurrido un error al intentar actualizar tus datos";
			}


		}else{
			$_SESSION["errores"]["general"]="El usuario ya existe";
		}
	}else{
		$_SESSION["errores"]=$errores;
	}


}
var_dump($_SESSION);
die();
header("Location: mis-datos.php");

?>