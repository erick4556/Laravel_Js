<div class="form-group">
		<label for="">Nombre</label>
		<input type="text" name="name" value="{{$movie->name}}" class="form-control">
	</div>

<div class="form-group">
		<label for="">Elenco</label>
		<input type="text" name="cast" value="{{$movie->cast}}" class="form-control" placeholder="Ingresa elenco">
	</div>	

<div class="form-group">
		<label for="">Dirección</label>
		<input type="text" name="direction" value="{{$movie->direction}}"  class="form-control" placeholder="Ingrese dirección">
	</div>	

<div class="form-group">
		<label for="">Duración</label>
		<input type="text" name="duration" value="{{$movie->duration}}" class="form-control" placeholder="Ingrese la duración">
	</div>

	<div class="form-group">
		<label for="">Poster</label>
		<input type="file" name="path">
	</div>

	<div class="form-group">
		<label for="">Genero</label>
		<select name="genero_id" class="form-control">
			
		@foreach($genero as $gener)
			<option value="{{$gener->id}}">{{$gener->genero}}</option>

		@endforeach
		</select>
	</div>	