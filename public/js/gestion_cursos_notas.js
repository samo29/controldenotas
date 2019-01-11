$(document).ready(function(){
	$("#listado_alumnos").on("click", ".asignacion", function(){
		$("input[name=idalumno]").val($(this).attr("id"))
	})

	$("#asignar").click(function(){
		$.ajax({
			url: "/cursos/asignarcurso",
			type: "POST",
			data: $("#formasignacion").serialize(),
			beforeSend:function(){
			},
			success:function(response){
				var respuesta = JSON.parse(response);

				if(respuesta.status){
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.success(respuesta.message);

					$("#formasignacion")[0].reset();
					$("#asignacioncursos").modal("hide");
				}else{
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.warning(respuesta.message);
				}
			}
		});		
	});

	$("#listado_alumnos").on("click", ".agregarn", function(){
		$("input[name=idalumnonota]").val($(this).attr("id"))
	})


	$("#agregar").click(function(){
		$.ajax({
			url: "/cursos/agregarnuevanota",
			type: "POST",
			data: $("#formnewnote").serialize(),
			beforeSend:function(){
			},
			success:function(response){
				var respuesta = JSON.parse(response);

				if(respuesta.status){
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.success(respuesta.message);

					$("#formnewnote")[0].reset();
					$("#agregarnota").modal("hide");
				}else{
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.warning(respuesta.message);
				}
			}
		});
	})
});
