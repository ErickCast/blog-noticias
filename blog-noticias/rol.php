<?php

if(isset($_POST)){
	require_once "conexion.php";

	$rol=isset($_POST["rol"]) ? mysqli_real_escape_string($db,$_POST["rol"]) : false;


	//acualizando
	$sql="UPDATE usuarios SET rol='$rol' WHERE id = $usuario['id']";
	mysqli_query($db, $sql);


	header("Location: editar_rol.php");





}


?>