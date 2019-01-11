$(document).ready(function(){
	$("#formnewclient").submit(function(e){
		e.preventDefault();
		
		proccessForm();
	});

	function proccessForm(){
		$.ajax({
			url: "/clientes/savenewclient",
			type: "POST",
			data: $("#formnewclient").serialize(),
			beforeSend:function(){
				//showLoading();
			},
			success:function(response){
				var respuesta = JSON.parse(response);

				if(respuesta.status){
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.success(respuesta.message);

					$("#formnewclient")[0].reset();
				}else{
					toastr.options.preventDuplicates = true;
					toastr.options.progressBar = true;
					toastr.warning(respuesta.message);
				}
			}
		});
	}
});