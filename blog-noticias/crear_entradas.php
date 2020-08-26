<?php

require_once "includes/header.php";
require_once "includes/helpers.php";


?>

<div class="row section mt-3">
	<div class="col">
		<h1>Crear articulo</h1>
		<form action="insertar_entrada.php" method="POST">
			<div class="form-group">
				<label for="titulo">Titulo:</label>
				<input type="text" name="titulo" class="form-control"> 
			</div>
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<textarea class="form-control" name="descripcion"></textarea>
			</div>

			<div class="form-group">
				<label for="categoria">Categoria:</label> <br>
				<select name="categoria">
					<?php
						$categorias=mostrarCategorias($db);
						if(!empty($categorias)){
							while($categoria=mysqli_fetch_assoc($categorias)):?>

							<option value="<?=$categoria['id']?>"><?= $categoria["nombre_cat"]?></option>

							






						<?php endwhile; 
						} ?>
					
				</select>
			</div>

			


			<input type="submit" name="" value="Agregar articulo">
			
		</form>
	</div>
</div>