<?php
require_once "includes/header.php";
require_once "includes/helpers.php";

?>

<div class="row section mt-3">
	<div class="col">
		<h1>Crear categoria</h1>
		<form action="insertar_categoria.php" method="POST">
			<div class="form-group">
				<label for="categoria">Nombre de la categoria:</label>
				<input type="text" name="categoria" class="form-control">
				<?php if(isset($_SESSION["errores"])): ?>
				<?php mostrarError($_SESSION["errores"], "categoria") ?>
				<?php endif; borrarErrores(); ?>
			</div>

			<input type="submit" name="" value="Agregar categoria" class="btn btn-success">
		</form>
	</div>
</div>
<br><br>
<div class="row section mt-3">
	<div class="col">
		
		<h1>Eliminar categoria</h1>
		<form action="eliminar-categoria.php" method="POST">
			<div class="form-group">
				<label for="categoria">Categoria:
				</label>
				<select name="categoria" class="form-control">
				<?php
					$categorias=mostrarCategorias($db);

					if(!empty($categorias)){
						while($categoria=mysqli_fetch_assoc($categorias)):?>

						<option value="<?= $categoria['id'] ?>"><?= $categoria["nombre_cat"] ?></option>
					

				<?php
			endwhile;
					}
				?>
				</select>

			</div>
		

			<input type="submit" name="" value="Eliminar categoria" class="btn btn-danger">
		</form>
	</div>
</div>

<?php
require_once "includes/footer.php";
?>