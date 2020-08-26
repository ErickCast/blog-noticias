<?php
function mostrarError($errores,$campo){
	$alerta="";


	if(isset($errores[$campo]) && !empty($campo)){
		$alerta="<div class='alert alert-danger'>". $errores[$campo]."</div>";
	}

	return $alerta;
}


function borrarErrores(){
	$borrado=false;
	if(isset($_SESSION["errores"])){
		$_SESSION["errores"]=null;
		$borrado=true;
	}
	if(isset($_SESSOIN["errores_entrada"])){
		$_SESSION["errores_entrada"]=null;
		$borrado=true;
	}
	if(isset($_SESSION["completado"])){
		$_SESSION["completado"]=null;
		$borrado=true;
	}
	if(isset($_SESSION["error_login"])){
		$_SESSION["error_login"]=null;
		$borrado=true;
	}
	if(isset($_SESSION["categoria"])){
		$_SESSION["categoria"]=null;
		$borrado=true;
	}
	return $borrado;
}


function mostrarCategorias($conexion){
	$sql = "SELECT * FROM categorias ORDER BY id ASC; ";

	$categorias=mysqli_query($conexion, $sql);
	$resultado=array();

	if($categorias && mysqli_num_rows($categorias)>=1){
		$resultado=$categorias;
	}
	return $resultado;

	
}

function mostrarCategoria($conexion, $id){
	$sql="SELECT * FROM categorias WHERE id='$id'";
	$categorias=mysqli_query($conexion, $sql);
	$resultado=array();
	if($categorias && mysqli_num_rows($categorias)>=1){
		$resultado=mysqli_fetch_assoc($categorias);
	}

	return $resultado;
}

function mostrarEntradas($conexion, $limit=null, $categoria=null, $busqueda=null){
	$sql="SELECT a.*, u.*, c.nombre_cat FROM articulos a ";
	$sql.="INNER JOIN usuarios u ON a.usuario_id=u.id ";
	$sql.="INNER JOIN categorias c ON a.categoria_id=c.id ";

	if(!empty($categoria)){
		$sql .="WHERE a.categoria_id=$categoria ";
	}
	if(!empty($busqueda)){
		$sql .= "WHERE a.titulo LIKE '%$busqueda%'";
	}

	$sql.="ORDER BY a.id DESC LIMIT 5 ";
	$entradas=mysqli_query($conexion, $sql);

	$resultado=array();

	if($entradas && mysqli_num_rows($entradas)>=1){
		$resultado=$entradas;
	}


	return $entradas;
}

function mostrarEntrada($conexion, $id){
	$sql="SELECT a.*, CONCAT(u.nombre, ' ' , u.apellidos) AS usuario, c.nombre_cat FROM articulos a " .  
	"INNER JOIN categorias c ON a.categoria_id=c.id " .
	"INNER JOIN usuarios u ON a.usuario_id=u.id " . 
	 
	"WHERE a.id=$id";

	$entrada=mysqli_query($conexion, $sql);

	$resultado=array();

	if($entrada && mysqli_num_rows($entrada) >=1){
		$resultado=mysqli_fetch_assoc($entrada);
	}

	return $resultado;
}

function mostrarUsuarios($conexion){
$sql="SELECT * FROM usuarios ORDER BY id DESC";

$usuarios=mysqli_query($conexion, $sql);

$resultado=array();

if($usuarios && mysqli_num_rows($usuarios)){
	$resultado=$usuarios;
}
return $resultado;

}




?>