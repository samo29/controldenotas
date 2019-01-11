$(document).ready(function(){
	$("#formnewstudent").submit(function(e){
		e.preventDefault();
		
		proccessForm();
	});

	function proccessForm(){
		$.ajax({
			url: "/alumnos/savenewstudent",
			type: "POST",
			data: $("#formnewstudent").serialize(),
			beforeSend:function(){
				//showLoading();
			},
			success:function(response){
				var respuesta = JSON.parse(response);

				if(respuesta.status){
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.success(respuesta.message);

					$("#formnewstudent")[0].reset();
				}else{
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.warning(respuesta.message);
				}
			}
		});
	}
});
