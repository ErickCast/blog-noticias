<?php 

if(isset($_POST)){
	require_once "conexion.php";
	$categoria=isset($_POST["categoria"]) ? $_POST["categoria"] : false;

	$sql="DELETE FROM categorias WHERE id=$categoria";
	$eliminar=mysqli_query($db, $sql);


	header("Location: index.php");
}




?>