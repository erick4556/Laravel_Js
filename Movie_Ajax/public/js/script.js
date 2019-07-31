$("#registro").click(function(){
	var dato = $("#genero").val(); //Hacer referencia al género y obtener su valor
	var route = "/genero";//"{{url('genero')}}";
	var token = $("#token").val();
	

	$.ajax({
		url:route,
		headers:{'X-CSRF-TOKEN': token},
		type:'POST',
		dataType:'json', //tipo de dato que se esta trabajando
		data:{genero: dato},
		success:function(){
		
			$("#msj-success").fadeIn();
			
		},
		 error:function(msj)
            {
             
                $("#msj-error").html(msj.responseJSON.genero);//Asignarle al alerta la respuesta que me esta llegando
            	$('#message-error').fadeIn(); 
            } 

	});

});