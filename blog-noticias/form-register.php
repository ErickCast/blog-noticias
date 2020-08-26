<?php
require_once "includes/header.php";
require_once "includes/helpers.php";
require_once "conexion.php";

?>


<?php
if(isset($_SESSION["completado"])):?>

<div class="alert alert-success"><?= $_SESSION["completado"] ?></div>

<?php
elseif(isset($_SESSION["errores"]["general"])) :
?>
<div class="alert alert-danger">
	<?= $_SESSION["errores"]["general"] ?>
</div>

<?php endif; ?>



<div class="row">
	<div class="col">
		<form action="register.php" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" class="form-control">
				<?php echo isset($_SESSION["errores"]) ? 
				mostrarError($_SESSION["errores"], "nombre") : ""; 

				?>
			</div>
			<div class="form-group">
				<label for="apellidos">Apellidos:</label>
				<input type="text" name="apellidos" class="form-control">
				<?php echo isset($_SESSION["errores"]) ? 
				mostrarError($_SESSION["errores"], "apellidos") : ""; 

				?>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control">
				<?php echo isset($_SESSION["errores"]) ? 
				mostrarError($_SESSION["errores"], "email") : ""; 

				?>
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control">
				<?php echo isset($_SESSION["errores"]) ? 
				mostrarError($_SESSION["errores"], "password") : ""; 

				?>
			</div>
			<div class="form-group">
				<label for="imagen">Foto de perfil</label>
				<input type="file" name="imagen" class="form-control">
				
			</div>

			<input type="submit" name="" value="Registrarse" class="btn btn-success">

		</form>
		<?php
			borrarErrores();

		?>
	</div>
</div>

<?php
require_once "includes/footer.php";

?>