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
				<td><a href="{{route('usuario.edit',$user->id)}}" class="btn btn-primary">Actualizar</a></td>
			</tbody>
		@endforeach
	</table>

	<div class="text-center">
               {{$users->links()}}
    </div>