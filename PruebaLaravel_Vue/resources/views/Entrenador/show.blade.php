@extends('layouts.app') <!-- Se hereda todo lo del layout-->

@section('title', 'Entrenador')

@section('content')

	@include('common.success')

	<div align="center">
	<img style="height: 200px; width: 200px; background-color: #efefef; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
	</div>
	<div class="text-center">
		<h5 class="card-title">{{$trainer->nombre}}</h5>
	
		<p>{{$trainer->descripcion}}</p>
		<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>

		<form  class="form-group" method="POST" action="/trainers/{{$trainer->slug}}">
			 {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>


		</form>

	</div>
	<modal-button></modal-button>
	<create-form-pokemon></create-form-pokemon>
	<list-of-components></list-of-components>
	
@endsection