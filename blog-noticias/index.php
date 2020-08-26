
<?php
require_once "includes/header.php";
?>


		<div class="row section mt-3">
			
			<?php
				$entradas=mostrarEntradas($db);
				if(!empty($entradas)){
					while($entrada=mysqli_fetch_assoc($entradas)):
				
			?>
			<div class="col-12 col-md-8">

				<div class="jumbotron">
					<h2 class=""><?= $entrada["titulo"]; ?></h2><small><?=$entrada["fecha"] . " " . $entrada["nombre"] . " " . $entrada["apellidos"] . " <strong>" . $entrada["nombre_cat"] . "</strong>"  ?></small>
					
					<p class=""><?= substr($entrada["descripcion"],0,180) . "...";?></p>
					<a class="btn btn-success" href="entrada.php?id=<?=$entrada['id'] ?>">Leer mas</a>
				</div>
				
			</div>

			
		<?php endwhile;
	}
		?>
		

		</div>
		<?php 
			require_once "includes/footer.php";
		?>
	</div>





<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>