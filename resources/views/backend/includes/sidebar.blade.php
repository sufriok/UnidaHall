<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="" disabled>
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button" disabled>
                        <i class="fa fa-university"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('rental.index') }}"><i class="fa fa-book fa-fw"></i> Peminjaman</a>
            </li>
            <li>
                <a href="{{ route('room.index') }}"><i class="fa fa-home fa-fw"></i> Aula</a>
            </li>
            <li>
                <a href="{{ route('message.index') }}"><i class="fa fa-envelope fa-fw"></i> Pesan</a>
            </li>
            <li>
                <a href="{{ route('user.index') }}"><i class="fa fa-user fa-fw"></i> Petugas</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>