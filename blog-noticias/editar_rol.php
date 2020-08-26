<?php
require_once "includes/header.php";
require_once "includes/helpers.php";


?>

<div class="row section mt-3">
	<div class="col">
		<table class="table table-bordered table-hover">
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Modificar rol</th>
			</tr>
		<?php
			$usuarios=mostrarUsuarios($db);
			if(!empty($usuarios)){
				while($usuario=mysqli_fetch_assoc($usuarios)):?>
				<tr>
					<td><?= $usuario["nombre"] ?></td>
					<td><?= $usuario["apellidos"] ?></td>
					<td><?= $usuario["email"] ?></td>
					<td><?= $usuario["rol"] ?></td>
					<td>
					<form action="rol.php" method="POST">
					<select name="rol">
						<option value="user">Usuario</option>
						<option value="admin">Admin</option>
					</select>
					<button type="submit" class="btn btn-success text-center">Actualizar rol</button>
		</form>
				</td>
				</tr>
				




				<?php
			endwhile;
			}


		?>


		</table>
		
	</div>
</div>



<?php
require_once "includes/footer.php";
?>