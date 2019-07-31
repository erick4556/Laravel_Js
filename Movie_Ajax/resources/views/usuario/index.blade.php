@extends('layouts.admin')
	
	@section('title', 'Lista de usuarios')

	@section('content')

	@include('common.success')

	<div class="users">
		
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Operación</th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td><a href="{{route('usuario.edit',$user->id)}}" class="btn btn-primary">Actualizar</a></td> <!--href="/usuario/$user->id/editar" o href="/usuario/editar/$user->id"-->
			</tbody>
		@endforeach
	</table>

		 <div class="text-center">
	          {{$users->links()}}
	     </div>
    </div>

	@endsection	

	@section('scripts')
		<script src="/js/script3.js"></script>
	@endsection
