@extends('layouts.app') <!-- Se hereda todo lo del layout-->

@section('title', 'Trainers create')

@section('content')

	@include('common.errors')

	<form  class="form-group" method="POST" action="/trainers" enctype="multipart/form-data"><!--enctype para poder enviar los archivos que agreguemos-->

	<!--Verificar que la petición sea correcta dentro de la aplicación-->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	@include('entrenador.form')

	<button type="submit" class="btn btn-primary">Guardar</button>
	
	</form>
	
	
@endsection


