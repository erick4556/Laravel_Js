@extends('layouts.app') <!-- Se hereda todo lo del layout-->

@section('title', 'Trainers edit')

@section('content')

<!--El container para que no coja toda la página
	<div class="container">-->

	<form  class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data"><!--enctype para poder enviar los archivos que agreguemos-->
	{{method_field('PUT')}}


	<!--Verificar que la petición sea correcta dentro de la aplicación-->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="">Nombre</label>
		<input type="text" name="nombre" value="{{$trainer->nombre}}" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Descripción</label>
		<input type="text" name="descripcion" value="{{$trainer->descripcion}}" class="form-control">
	</div>
<!--
	<p align="center">Imagen</p>

	<img style="height: 100px; width: 100px; background-color: #efefef; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/$trainer->avatar" alt="">-->

	<div class="form-group">
		<label for="">Avatar</label>
		<input type="file" name="avatar">
	</div>

		<button type="submit" class="btn btn-primary">Actualizar</button>


	</form>	

	
	
@endsection



