<?php
require_once "includes/header.php";
require_once "includes/helpers.php";
?>


<?php
$entrada_actual=mostrarEntrada($db, $_GET["id"]);
if(!isset($entrada_actual["id"])){
	header("Location: index.php");
}
?>


<div class="row section mt-3">

	<div class="col">

				<h2><?=$entrada_actual["titulo"]?></h2>
				<small><?=$entrada_actual["fecha"] . " " . $entrada_actual["usuario"] . " <strong>" . $entrada_actual["nombre_cat"] . "</strong>"  ?></small>
				<p><?= $entrada_actual["descripcion"] ?></p>

				<a href="index.php" class="btn btn-success">Volver a inicio</a>
	</div>
	
</div>


<?php require_once "includes/footer.php"; ?>


