$(document).ready(function(){
	$("#formnewcourse").submit(function(e){
		e.preventDefault();
		
		proccessForm();
	});

	function proccessForm(){
		$.ajax({
			url: "/cursos/savenewcourse",
			type: "POST",
			data: $("#formnewcourse").serialize(),
			beforeSend:function(){
				//showLoading();
			},
			success:function(response){
				var respuesta = JSON.parse(response);

				if(respuesta.status){
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.success(respuesta.message);

					$("#formnewcourse")[0].reset();
				}else{
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.warning(respuesta.message);
				}
			}
		});
	}
});
