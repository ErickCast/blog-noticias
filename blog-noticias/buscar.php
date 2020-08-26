<?php
if(!isset($_POST["busqueda"])){
	header("Location: index.php");
}

require_once "includes/header.php";



?>
<div class="row section mt-3">
	<div class="col-12 col-md-8">
		<h1>Busqueda: <?= $_POST["busqueda"] ?></h1>


		<?php
		$entradas=mostrarEntradas($db, null, null, $_POST["busqueda"]);


		if(!empty($entradas) && mysqli_num_rows($entradas)>=1){
			while($entrada=mysqli_fetch_assoc($entradas)):?>
			<div class="jumbotron">
					<h2 class=""><?= $entrada["titulo"]; ?></h2><small><?=$entrada["fecha"] . " " . $entrada["nombre"] . " " . $entrada["apellidos"] . " <strong>" . $entrada["nombre_cat"] . "</strong>"  ?></small>
					
					<p class=""><?= substr($entrada["descripcion"],0,180) . "...";?></p>
					<a class="btn btn-success" href="entrada.php?id=<?=$entrada['id'] ?>">Leer mas</a>
				</div>
			




			<?php
		endwhile;
		}



		?>

	</div>
	<div class="col-12 col-md-4">
		<h2>Otras entradas</h2>
		<ul>
			<li><a href="#">Entradas 1</a></li>
			<li><a href="#">Entradas 2</a></li>
			<li><a href="#">Entradas 3</a></li>
			<li><a href="#">Entradas 4</a></li>
		</ul>
	</div>
</div>



<?php
require_once "includes/footer.php";

?>




