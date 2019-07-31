@extends('layouts.admin')
	
	@section('title', 'Lista de películas')

	@section('content')

	@include('common.success')
	
	<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Genero</th>
				<th>Direccion</th>
				<th>Caratula</th>
				<th>Operaciones</th>
			</thead>
			@foreach($movie as $movie)
				<tbody>
					<td>{{$movie->name}}</td>
					<td>{{$movie->genero}}</td>
					<td>{{$movie->direction}}</td>
					<td>
						<img src="movies/{{$movie->path}}" alt="" style="width:100px;"/>
					</td>
					<td><a href="{{route('pelicula.edit',$movie->id)}}" class="btn btn-primary">Editar</a></td>
				</tbody>
			@endforeach
		</table>

		 
    </div>

@endsection



