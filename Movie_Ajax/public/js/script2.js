$(document).ready(function(){
	Carga();
});	

function Carga(){
	var tablaDatos = $("#datos");
	var route = "/generos";

	//Hacer referencia a los datos y limpiar
	$("#datos").empty();
	$.get(route, function(res){ //dentro de la petición get le voy a pasar la ruta
		$(res).each(function(key,value){//Cuando se itera los géneros se va poder acceder a una llave que se va usar para mapear cada género
		
		tablaDatos.append("<tr><td>"+value.genero+"</td><td><button value="+value.id+" Onclick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" Onclick='Eliminar(this);'>Eliminar</button></td>/tr>");
	});		
	
	});
}

function Mostrar(btn){
	//console.log(btn.value);
	var route = "/genero/"+btn.value+"/edit";
	//var route = "{{url('genero')}}/"+btn.value+"/edit";

	$.get(route, function(res){
		$("#id").val(res.id);
		$("#genero").val(res.genero); //Se hace referencia y se le asigna el valor	
	});
}

//Envío a la ruta customizada
/*function Mostrar(btn){
	//console.log(btn.value);
	var route = "/genero/"+btn.value+"/editar";
	//var route = "/genero/editar/"+btn.value;
	//var route = "{{url('genero')}}/"+btn.value+"/edit";

	$.get(route, function(res){
		$("#id").val(res.id);
		$("#genero").val(res.genero); //Se hace referencia y se le asigna el valor	
	});
}*/


$("#actualizar").click(function(){
	var value = $("#id").val();
	var gener = $("#genero").val(); //Viene del input
	//var route = "/genero/"+value+"/actualizar"; //Ruta customizada
	//var route = "/genero/actualizar/"+value; //Ruta customizada
	var route = "/genero/"+value+"";
	var token = $("#token").val(); //Para decir que la petición no es mal intencionada

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {genero: gener},
		success: function(){
			//Cada ves que se haga una actualización se trae el método carga que va es a actualizar
			Carga();
			$("#myModal").modal('toggle');//ocultar el modal
			$("#msj-success").fadeIn();//mensaje
		},
		 error:function()
    	{	
    		$("#message-error").fadeIn();

        }		
	});
});

$("#myModal").on("hidden.bs.modal", function () {
    $("#message-error").fadeOut()
});


function Eliminar(btn){
	var route = "/genero/"+btn.value+"";
	var token = $("#token").val(); //Para decir que la petición no es mal intencionada

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			//Cada ves que se haga una eliminación se trae el método carga que va es a actualizar
			Carga();
			$("#msj-delete").fadeIn();//mensaje
		}

	});	
}


/*$("#enviar").click(function(){
	var value = 1
	//var gener = $("#genero").val(); //Viene del input
	var route = "/genero/ver"+value+"";
	var token = $("#token").val(); //Para decir que la petición no es mal intencionada

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		//data: {genero: gener},
		success: function(){
			//Cada ves que se haga una actualización se trae el método carga que va es a actualizar
			/*Carga();
			$("#myModal").modal('toggle');//ocultar el modal
			$("#msj-success").fadeIn();//mensaje*/
	/*	}		
	});
});*/


