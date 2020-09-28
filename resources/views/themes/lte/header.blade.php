<header class="main-header">
	<a href="{{ route('home') }}" class="logo">
		<span class="logo-mini">SYS</span>
		<span class="logo-lg">SGCV</span>
	</a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span></a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset("assets/lte/dist/img/perfil02.png") }}" class="user-image" alt="Avatar Man">
						<span class="hidden-xs">{{Auth::id()}}</span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="{{ asset("assets/lte/dist/img/perfil02.png") }}" class="img-circle" alt="Avatar Man">
							<p>{{ Auth::id() }}</p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Cambiar clave</a>
							</div>
							<div class="pull-right">
								<a href="{{ route('logout') }}" class="btn btn-default btn-flat">Cerrar sesion</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>