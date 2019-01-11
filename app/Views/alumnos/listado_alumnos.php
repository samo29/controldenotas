<main class="container-fluid">
		<section class="row mt-5">
			<div class="col-lg-12 mt-5 text-right">
				<a href="/alumnos/nuevoalumno" class="btn btn-success">Nuevo alumno</a>
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
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="listado_alumnos">
						<?php print $data['tabla_alumnos']; ?>
					</tbody>
				</table>
			</div class="col-lg-12">
		</section>
</main>

<!-- Modal asignar curso -->
<div class="modal fade" id="asignacioncursos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form id="formasignacion">
		<input type="hidden" name="idalumno">
		<?php print $data['cursos']; ?>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="asignar">Asignar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal agregar nota -->
<div class="modal fade" id="agregarnota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar calificacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form id="formnewnote">
		<input type="hidden" name="idalumnonota">
		<div class='form-group'>
			<label>Curso:</label>
			<?php print $data['cursos']; ?>
		</div>
		<div class='form-group'>
			<label>Bimestre:</label>
			<select class="form-control" name="bimestre">
				<option value="0">Seleccione el bimestre</option>
				<option value="1">Primero</option>
				<option value="2">Segundo</option>
				<option value="3">Tercero</option>
				<option value="4">Cuarto</option>
			</select>
		</div>
		<div class='form-group'>
			<label>Nota:</label>
			<input type="number" name="calificacion" class="form-control" autocomplete="off" min="0" max="100">
		</div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="agregar">Agregar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script src="../js/gestion_cursos_notas.js"></script>
<script>
	$(document).ready(function(){
		$("#myTable").DataTable();
	})
</script>
