@extends('layouts.app') <!-- Se hereda todo lo del layout-->

@section('title', 'Trainers create')

@section('content')

<!--El container para que no coja toda la página
	<div class="container">-->

	<form  class="form-group" method="POST" action="/trainers" enctype="multipart/form-data"><!--enctype para poder enviar los archivos que agreguemos-->

	<!--Verificar que la petición sea correcta dentro de la aplicación-->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="">Nombre</label>
		<input type="text" name="nombre" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Descripción</label>
		<input type="text" name="descripcion" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Ruta</label>
		<input type="text" name="slug" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Avatar</label>
		<input type="file" name="avatar">
	</div>

		<button type="submit" class="btn btn-primary">Guardar</button>


	</form>	

	
	
@endsection
<!-- 
<html>
<head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>

	

</body>
</html>-->


