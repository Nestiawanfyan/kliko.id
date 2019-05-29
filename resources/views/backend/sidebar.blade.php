<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('asset-backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth('admin')->user()->nama }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">TUTOR NAVIGATION</li>
            <li>
                <a href="{{ route('admin') }}">
                    <i class="fa fa-dashboard"></i> <span>Beranda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.administrator') }}">
                    <i class="fa fa-user"></i> <span>Administrator</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user') }}">
                    <i class="fa fa-users"></i> <span>User</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kost') }}">
                    <i class="fa fa-home"></i> <span>Kost</span>
                </a>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-suitcase"></i>
                    <span>Fasilitas</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.fu') }}"><i class="fa fa-circle-o"></i> Fasilitas Umum</a></li>
                    <li><a href="{{ route('admin.fkm') }}"><i class="fa fa-circle-o"></i> Fasiltas Kamar Mandi</a></li>
                    <li><a href="{{ route('admin.fk') }}"><i class="fa fa-circle-o"></i> Fasilitas Khusus</a></li>
                    <li><a href="{{ route('admin.fl') }}"><i class="fa fa-circle-o"></i> Fasilitas Lingkungan</a></li>
                    <li><a href="{{ route('admin.fr') }}"><i class="fa fa-circle-o"></i> Fasilitas Ruangan</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.logout') }}">
                    <i class="fa fa-power-off"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
