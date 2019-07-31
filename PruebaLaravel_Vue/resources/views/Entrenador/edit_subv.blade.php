@extends('layouts.app') <!-- Se hereda todo lo del layout-->

@section('title', 'Trainers edit')

@section('content')


	<form  class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data"><!--enctype para poder enviar los archivos que agreguemos-->
	{{method_field('PUT')}}

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	@include('entrenador.form_edit')

	<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>	

	
	
@endsection



