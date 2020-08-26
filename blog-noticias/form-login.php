<?php
require_once "includes/header.php";
?>



<?php
if(isset($_SESSION["error_login"])):
 ?>

 <div class="alert alert-danger">
 	<?= $_SESSION["error_login"]; ?>
 </div>
<?php endif; ?>
<div class="row">
	<div class="col">
		<form action="login.php" method="POST">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Contraseña:</label>
				<input type="password" name="password" class="form-control">
			</div>

			<input type="submit" name="" value="Ingresar" class="btn btn-primary">
		</form>
	</div>
</div>

<?php
borrarErrores();

require_once "includes/footer.php";

?>