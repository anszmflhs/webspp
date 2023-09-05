<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WEB SPP</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    {{-- @can('read-customer') --}}
    @if (auth()->user()->hasRole('admin'))
    <li class="nav-item {{ request()->segment(2) == 'admin' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Admin</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'petugas' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Petugas</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'siswa' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Siswa</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'permintaan' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('permintaan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pembayaran</span></a>
    </li>
    @elseif (auth()->user()->hasRole('petugas'))
    <li class="nav-item {{ request()->segment(2) == 'petugas' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Petugas</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'siswa' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Siswa</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'permintaan' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('permintaan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pembayaran</span></a>
    </li>
    @elseif (auth()->user()->hasRole('siswa'))
    <li class="nav-item {{ request()->segment(2) == 'bayarsekarang' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('bayarsekarang.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pembayaran</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
