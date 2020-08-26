<?php
require_once "includes/header.php";
require_once "includes/header.php";

?>


<div class="row section mt-3">
	<div class="col">
		<form action="actualizar_datos.php" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos:</label>
				<input type="text" name="apellidos" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Actualizar datos</button>


		</form>
	</div>
</div>

<?php
require_once "includes/footer.php";
?>


