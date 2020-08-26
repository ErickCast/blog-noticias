<?php

if(isset($_POST)){
	require_once "conexion.php";

	//Recoger valores del formulario
	$categoria=isset($_POST["categoria"]) ? mysqli_real_escape_string($db, $_POST["categoria"]) : false;


	//Validacion
	$errores=array();

	if(empty($categoria)){
		$errores["categoria"]= "La categoria no puede quedar vacia";

	}

	if(count($errores)==0){
		$sql="INSERT INTO categorias VALUES(NULL, '$categoria');";
		$guardar=mysqli_query($db, $sql);

		header("Location: index.php");
	}else{
		$SESSION["errores"]=$errores;
		header("Location: crear_categorias.php");
	}

}



?>