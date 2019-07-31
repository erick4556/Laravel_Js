@extends('layouts.admin')
	
	@section('title', 'Editar Película')

	@section('content')

	@include('common.errors')

	<form method="POST" action="/pelicula/{{$movie->id}}" enctype="multipart/form-data">
	{{method_field('PUT')}}

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	@include('pelicula.form.form_edit')	

	<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>

	<form  class="form-group" method="POST" action="/pelicula/{{$movie->id}}">
			 {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>


		</form>


	@endsection