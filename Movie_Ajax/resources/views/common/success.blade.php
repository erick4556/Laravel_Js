	
	<!--Edit-->
	@if(session('status')) <!--Se hace la pregunta que si existe un sessión que se envia del controlador-->
		<div class="alert alert-success">
			{{session('status')}}
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	@endif

	<!-- Otra forma-->
	@if (Session::has('update'))
	
	<div class="alert alert-success" role="alert">
		
		<strong>{{Session::get('update')}}</strong>

	</div>

	@endif

	@if(session('delete')) <!--Se hace la pregunta que si existe un sessión que se envia del controlador-->
		<div class="alert alert-danger">
			{{session('delete')}}
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	@endif

