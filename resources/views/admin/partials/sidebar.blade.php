<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li class="{{ Route::current()->getName() == 'admin.users.create' || Route::current()->getName() == 'admin.users' || Route::current()->getName() == 'admin.users.edit' ? 'active' : ''}}">
				<a href="{{ route('admin.users') }}"><i class='fa fa-user'></i> <span>Usuários</span></a>
			</li>
			<li class="{{ Route::current()->getName() == 'admin.products.toys.create' || Route::current()->getName() == 'admin.products.toys.index' || Route::current()->getName() == 'admin.products.clothes.create' || Route::current()->getName() == 'admin.products.clothes.index' || Route::current()->getName() == 'admin.products.quotas.create' || Route::current()->getName() == 'admin.products.quotas.index' ? 'active' : ''}} treeview menu-open">
				<a href="#">
					<i class="fa fa-archive"></i> <span>Produtos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="{{ Route::current()->getName() == 'admin.products.toys.create' || Route::current()->getName() == 'admin.products.toys.index' ? 'active' : ''}}"><a href="{{ route('admin.products.toys.index') }}"><i class="fa fa-circle-o"></i> Brinquedos</a></li>
					<li class="{{ Route::current()->getName() == 'admin.products.clothes.create' || Route::current()->getName() == 'admin.products.clothes.index' ? 'active' : ''}}"><a href="{{ route('admin.products.clothes.index') }}"><i class="fa fa-circle-o"></i> Roupas</a></li>
					<li class="{{ Route::current()->getName() == 'admin.products.quotas.create' || Route::current()->getName() == 'admin.products.quotas.index' ? 'active' : ''}}"><a href="{{ route('admin.products.quotas.index') }}"><i class="fa fa-circle-o"></i> Cotas</a></li>
				</ul>
			</li>

		</ul><!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>



