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
            <li class="{{ Route::current()->getName() == 'admin.products.create' || Route::current()->getName() == 'admin.products.index' ? 'active' : ''}}">
                <a href="{{ route('admin.products.index') }}"><i class='fa fa-instagram'></i> <span>Produtos</span></a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>



