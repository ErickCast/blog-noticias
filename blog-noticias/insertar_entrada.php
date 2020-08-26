<?php
if(isset($_POST)){
	require_once "conexion.php";

	$titulo=isset($_POST["titulo"]) ? mysqli_real_escape_string($db, $_POST["titulo"]) : false;
	$descripcion=isset($_POST["descripcion"]) ? mysqli_real_escape_string($db, $_POST["descripcion"]) : false;
	$categoria=isset($_POST["categoria"]) ? $_POST["categoria"] : false;


	$usuario=$_SESSION["usuario"]["id"];

	$errores=array();

	//Validacion
	if(!empty($titulo)){
		$titulo_validado=true;
	}else{
		$titulo_validado=false;
		$errores["titulo"]="El titulo no es valido";
	}
	if(!empty($descripcion)){
		$descripcion_validado=true;
	}
	else{
		$descripcion_validado=false;
		$errores["descripcion"]="La descripcion no es valida";


	}

	$guardar_entrada=false;

	if(count($errores)==0){
		$guardar_entrada=true;

		$sql="INSERT INTO articulos VALUES(NULL, $usuario, $categoria, '$titulo', NOW(), NULL, '$descripcion'); ";



		$guardar=mysqli_query($db, $sql);


		header("Location: index.php");

		
	}else{
		$_SESSION["errores_entrada"]=$errores;
	}

	



}




?>