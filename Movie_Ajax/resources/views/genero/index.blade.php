@extends('layouts.admin')
	
	@section('title', 'Lista de géneros')

	@section('content')
	
	@include('genero.modal')

	

	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
  		<strong> Genero Actualizado Correctamente.</strong>
	</div>

	<div id="msj-delete" class="alert alert-success alert-dismissible" role="alert" style="display:none">
  		<strong> Genero eliminado correctamente.</strong>
	</div>


		<table class="table">
		<thead>
			<th>Género</th>
			
			<th>Operacion</th>
		</thead>

		<tbody id="datos"></tbody>
		
	</table>


	@endsection	

	<!--<button id="enviar" class="btn btn-primary">Enviar</button>-->

	@section('scripts')
		<script src="js/script2.js"></script>
	@endsection