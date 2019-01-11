
	<main class="container">
		<section class="row justify-content-center my-5">
			<div class="col-lg-8 card mt-5 shadow">
				<form action="" method="POST" id="formnewclient" class="card-body">
					<div class="form-group">
						<label for="nombres">Nombres del cliente</label>
						<input type="text" class="form-control" name="nombres" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="apellidos">Apellidos del cliente</label>
						<input type="text" class="form-control" name="apellidos" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono del cliente</label>
						<input type="text" class="form-control" name="telefono" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="email">Correo electrónico del cliente</label>
						<input type="text" class="form-control" name="email" autocomplete="off">
					</div>					
					<div class="form-group">
						<label for="direccion">Dirección del cliente</label>
						<input type="text" class="form-control" name="direccion" autocomplete="off">
					</div>
					<div class="text-center">
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
				</form>
			</div>
		</section>	
	</main>
	<script src="../js/nuevo-cliente.js"></script>
</body>
</html>