<?php


if(isset($_POST)){
	require_once "conexion.php";

	//Recogiendo valores del formulario
	$nombre=isset($_POST["nombre"]) ? mysqli_real_escape_string($db,$_POST["nombre"]) : false;
	$apellidos=isset($_POST["apellidos"]) ? mysqli_real_escape_string($db,$_POST["apellidos"]) : false;
	$email=isset($_POST["email"]) ? mysqli_real_escape_string($db,trim($_POST["email"])) : false;
	$password=isset($_POST["password"]) ? mysqli_real_escape_string($db,($_POST["password"])) : false;
	$imagen=isset($_POST["imagen"]) ? mysqli_real_escape_string($db,$_POST["imagen"]) : false;

	
	$errores=array();

	//Validar formulario
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado=true;

	}else{
		$nombre_validado=false;
		$errores["nombre"]="El nombre no es valido";

	}
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validado=true;
	}else{
		$apellidos_validado=false;
		$errores["apellidos"]="El apellidos no es valido";
	}
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado=true;
	}else{
		$email_validado=false;
		$errores["email"]="El email no es valido";
	}
	if(!empty($password)){
		$password_validado=true;
	}
	else{
		$password_validado=false;
		$errores["password"]="La contraseña no puede quedar vacia";
	}
		$guardar_usuario=false;



	if(count($errores)==0){
		$guardar_usuario=true;

		$password_segura=password_hash($password, PASSWORD_BCRYPT, ["cost"=>4]);

		$sql="INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_segura', 'user', NULL);";


		$guardar=mysqli_query($db, $sql);
		

		if($guardar){
			$SESSION["completado"]="Se ha registrado el usuario correctamente";
		}else{
			$_SESSION["errores"]["general"]="Ha ocurrido un error al guardar el usuario";
		}


	}else{
		$_SESSION["errores"]=$errores;
	}
	
	
	




}
header("Location: form-register.php");

?>