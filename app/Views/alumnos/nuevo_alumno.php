
	<main class="container">
		<section class="row justify-content-center my-5">
			<div class="col-lg-8 card mt-5 shadow">
				<form action="" method="POST" id="formnewstudent" class="card-body">
					<div class="form-group">
						<label for="nombres">Nombres del alumno</label>
						<input type="text" class="form-control" name="nombres" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="apellidos">Apellidos del del alumno</label>
						<input type="text" class="form-control" name="apellidos" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="edad">Edad</label>
						<input type="text" class="form-control" name="edad" autocomplete="off">
					</div>
					<div class="text-center">
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
				</form>
			</div>
		</section>	
	</main>
	<script src="../js/nuevo-alumno.js"></script>
</body>
</html>
