$(document).on('click','.pagination a', function(e){
	e.preventDefault();//prevenir que el evento desencadene algo
	var page = $(this).attr('href');//.split('page=')[1]; //split para dividir las cadenas de ruta
	//var route = "http://localhost:8000/usuario";	

	$.ajax({
		url:page,
		//data:{page:page},
		type:'GET',
		dataType: 'json',
		success: function(data){
			$(".users").html(data);
		}

	});

});