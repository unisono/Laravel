<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="/css/app.css">

</head>
<body>


<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">

			<li class="{{ request()->is('contactar*') ? 'active' : '' }}"><a  href="{{ route('mensajes.create') }}">Contactar</a></li>


			@if( Auth::check() && Auth()->user()->hasRole(['admin','estudiante']) )
			<li><a class="{{ request()->is('usuarios*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">Usuarios</a></li>
				@endif

		</ul>

		<ul class="nav navbar-nav navbar-right">

			<li class="dropdown">
				@if(Auth()->guest())
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <b class="caret"></b></a>
				@else
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth()->user()->name}} <b class="caret"></b></a>

				@endif
				<ul class="dropdown-menu">
					@if(Auth()->guest())
						<li><a href="{{ route('entrar') }}">Entrar</a></li>
						<li><a href="{{ route('face') }}">Facebook</a></li>
					@else
						<li><a class="{{ request()->is('mensajes') ? 'active' : '' }}" href="{{ route('mensajes.index') }}">Mensajes</a></li>
						<li><a href="{{ route('salir') }}">Salir [{{Auth()->user()->email}}]</a></li>

					@endif

				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>
<div class="page-header">
	<h1>@yield('titulo')
		<small>@</small>
	</h1>
</div>

<div class="container">
	<!-- Content here -->

	<div id="app">
		<span  v-html="hi"></span>
		<input type="text" v-model="hi">
	</div>
	@yield('content')
</div>



<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
</body>

</html>