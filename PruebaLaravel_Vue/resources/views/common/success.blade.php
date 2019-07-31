	
	<!--Edit-->
	@if(session('status')) <!--Se hace la pregunta que si existe un sessión que se envia del controlador-->
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif