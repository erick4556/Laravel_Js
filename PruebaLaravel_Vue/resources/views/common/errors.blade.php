
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