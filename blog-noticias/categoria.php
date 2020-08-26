<?php 
require_once "includes/header.php";
require_once "includes/helpers.php";
?>

<?php
	$categoria_actual=mostrarCategoria($db, $_GET["id"]);
	if(!isset($categoria_actual["id"])){
		header("Location: index.php");
	}
?>

<?php

?>


<div id="principal">
	
	<h1>Entradas de <?= $categoria_actual["nombre_cat"] ?></h1>
	<?php
	$entradas=mostrarEntradas($db, null, $_GET["id"]);
	if(!empty($entradas) && mysqli_num_rows($entradas)>=1){
		while($entrada=mysqli_fetch_assoc($entradas)) :
	
	?>
	<div class="row section mt-3">
	<div class="col-12 col-md-8">

				<div class="jumbotron">
					<h2 class=""><?= $entrada["titulo"]; ?></h2><small><?=$entrada["fecha"] . " " . $entrada["nombre"] . " " . $entrada["apellidos"] . " <strong>" . $entrada["nombre_cat"] . "</strong>"  ?></small>
					
					<p class=""><?= substr($entrada["descripcion"],0,180) . "...";?></p>
					<a class="btn btn-success" href="entrada.php?id=<?=$entrada['id']?>">Leer mas</a>
				</div>
				
			</div>
	</div>





<?php endwhile; }else{ ?>

<div class="alert alert-warning">No hay articulos en esta categoria</div>

<?php } ?>

</div>
