@extends('layouts.admin')
	
	@section('title', 'Crear Genero')

	@section('content')


	<form  class="form-group">

	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    		<strong> Genero Agregado Correctamente.</strong>
		</div>

	 <div id='message-error' class="alert alert-danger danger" role='alert' style="display: none">
      <strong id="msj-error">No puede dejar campos vacios</strong>
    </div>		

	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" >

	@include('genero.form.form_create')

	<button id="registro" type="submit" class="btn btn-primary">Registrar</button>

	</form>

	@endsection

	@section('scripts')
		<script src="/js/script.js"></script>
	@endsection
