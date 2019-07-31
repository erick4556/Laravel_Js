@extends('layouts.admin')
	
	@section('title', 'Crear Pelicula')

	@section('content')

	@include('common.errors')

	<form class="form-group" method="POST" action="/pelicula" enctype="multipart/form-data">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">		

	@include('pelicula.form.form_create')

	<button type="submit" class="btn btn-primary">Registrar</button>
	
	</form>


	@endsection
