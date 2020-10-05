<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset("assets/lte/dist/img/perfil02.png") }}" class="img-circle" alt="Avatar Man">
			</div>
			<div class="pull-left info">
				<p class="text-session">{{ session()->get('usuario') }}</p>
				<a href="javascript: void(0);"><i class="fa fa-circle text-success"></i> Activo</a>
			</div>
		</div>
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU PRINCIPAL</li>
			<li class="treeview">
				<a href="javascript: void(0);">
					<i class="fa fa-briefcase"></i><span>Administración</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="index.html"><i class="fa fa-circle-o"></i> Requerimientos</a></li>
					<li><a href="index.html"><i class="fa fa-circle-o"></i> Tesorería</a></li>
					<li><a href="index.html"><i class="fa fa-circle-o"></i> Contabilidad</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-usd"></i><span>Finanzas</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('finanzas.lista-presupuestos.index') }}"><i class="fa fa-circle-o"></i> Lista de Presupuestos</a></li>
					<li><a href="{{ route('finanzas.presupuesto.index') }}"><i class="fa fa-circle-o"></i> Presupuesto</a></li>
					<li><a href="{{ route('finanzas.centro-costos.index') }}"><i class="fa fa-circle-o"></i> Centro de Costos</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>