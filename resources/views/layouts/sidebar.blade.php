<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="vendor/index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>


    @if(Auth::user()->hasDirectPermission('view material'))
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('material')}}">
            <i class="fas fa-fw fa-recycle"></i>
            <span>Material</span></a>
    </li>
    @endif

    @if(Auth::user()->hasDirectPermission('view transaksi'))
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('transaction')}}">
            <i class="fa fa-fw fa-microchip"></i>
            <span>Transaksi</span></a>
    </li>
    @endif

    @if(Auth::user()->hasDirectPermission('view report'))
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="vendor/index.html">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span></a>
    </li>
    @endif

    @if(Auth::user()->hasDirectPermission('create management'))
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="vendor/#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Managements</span>
        </a>
        @if(Auth::user()->hasAnyDirectPermission(['create management', 'view users', 'view jabatan', 'view hak
        akses']))
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Setting</h6>
                @if(Auth::user()->hasDirectPermission('view users'))
                <a class="collapse-item" href="{{route('users')}}">Users</a>
                @endif
                @if(Auth::user()->hasDirectPermission('view jabatan'))
                <a class="collapse-item" href="{{route('roles')}}">Jabatan</a>
                @endif
                @if(Auth::user()->hasDirectPermission('view hak akses'))
                <a class="collapse-item" href="{{route('permission')}}">Hak Akses</a>
                @endif
            </div>
        </div>
        @endif
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>