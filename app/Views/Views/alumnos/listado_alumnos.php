<main class="container-fluid">
		<section class="row mt-5">
			<div class="col-lg-12 mt-5 text-right">
				<a href="/clientes/nuevocliente" class="btn btn-success">Nuevo alumno</a>
			</div>
		</section>		
		<section class="row mt-4" style="padding-top:60px">
			<div class="col-lg-12">
				<table class="table table-striped" id="myTable">
					<thead>
						<tr>
							<th>Carnet</th>
							<th>Nombre alumno</th>
							<th>Edad</th>
						</tr>
					</thead>
					<tbody>
						<?php print $data['tabla-alumnos']; ?>
					</tbody>
				</table>
			</div class="col-lg-12">
		</section>
</main>
</body>
</html>
<script>
	$(document).ready(function(){
		$("#myTable").DataTable();
	})
</script>
