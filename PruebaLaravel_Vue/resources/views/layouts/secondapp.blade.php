<!DOCTYPE html>
<html>
<head>
	<!--yield puede mostrar contenido de una sección. -->
	<title>Prueba - Laravel  @yield('title')</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

	<nav class="navbar navbar-dark bg-primary">
		
		<a href="" class="navbar-brand">Prueba</a>
	</nav>

	<div class="container">
	@yield('content')
	</div>
	
</body>
</html>