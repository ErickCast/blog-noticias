<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>
<body>
<?php require_once "conexion.php";
	require_once "includes/helpers.php";
 ?>
	<div class="container web">
		<div class="row">
			<div class="col-12 col-md-8">

				<a href="index.php"><h1>Blog de Noticias</h1></a>
				
			</div>
			<div class="col-12 col-md-4">
				<?php 
	if(isset($_SESSION["usuario"])){

?>

<div id="usuario-logueado" class="bloque">
	<h3><?= $_SESSION["usuario"]["nombre"] . " ". $_SESSION["usuario"]["apellidos"]; ?></h3>

	<?php 
		if($_SESSION["usuario"]["rol"]=="admin"):
	?>

	<a href="crear_entradas.php" class="btn btn-primary">Crear entradas</a>
	<a href="crear_categorias.php" class="btn btn-success">Crear categorias</a>
	<a href="editar_rol.php" class="btn btn-dark">Editar roles</a>

<?php endif; ?>
	<a href="mis-datos.php" class="btn btn-warning">Mis datos</a>
	<a href="cerrar.php" class="btn btn-danger">Cerrar Sesion</a>

</div>


<?php
}else{


?>
				<p><a href="form-login.php">Iniciar sesion </a>| <a href="form-register.php">Registrarse</a></p>

				<?php } ?>
				
			</div>
		</div>
		<div class="row mt-3">
			<div class="col">
				<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      	<a class="nav-link" href="index.php">Inicio</a>
      </li>
      <?php 
      	$categorias=mostrarCategorias($db);

      	if(!empty($categorias)){
      		while($categoria=mysqli_fetch_assoc($categorias)):?>

      <li class="nav-item">
        <a class="nav-link" href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria["nombre_cat"]; ?></a>
      </li>
  <?php endwhile;
    }
    ?>
     
    </ul>
    <form class="form-inline my-2 my-lg-0" action="buscar.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
			</div>
		</div>