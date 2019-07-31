@extends('layouts.admin')
	
	@section('title', 'Editar Usuario')

	@section('content')

	@include('common.errors')

	<form method="POST" action="/usuario/{{$usuario->id}}"> <!--/usuario/$usuario->id/actualizar" o  /usuario/actualizar/$usuario->id"-->
	{{method_field('PUT')}}

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	@include('usuario.form_edit')

	<button type="submit" class="btn btn-primary">Actualizar</button>
	
	</form>	

	<form  class="form-group" method="POST" action="/usuario/{{$usuario->id}}">
			 {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>


		</form>

	@endsection	