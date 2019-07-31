
<!--Create-->
@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error) <!--Recorre todos los errores -->
				<p>{{$error}}</p>
			@endforeach

			</ul>

		</div>
		
	@endif


@if(session('message-error')) <!--Se hace la pregunta que si existe una sessión que se envia del controlador-->
		<div class="alert alert-danger">
			{{session('message-error')}}
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	@endif