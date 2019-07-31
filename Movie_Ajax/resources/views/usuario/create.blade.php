@extends('layouts.admin')
	
	@section('title', 'Crear Usuario')

	@section('content')

	@include('common.errors')
	
	<form  class="form-group" method="POST" action="/usuario" >

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	@include('usuario.form_create')

	<button type="submit" class="btn btn-primary">Registrar</button>

	</form>

	@endsection