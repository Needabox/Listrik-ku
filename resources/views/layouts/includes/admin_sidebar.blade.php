<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fa fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Listrik Kita</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
        <li class="nav-item">
            <a class="nav-link" href="{{ route('daya') }}">
            <i class="fa fa-bolt"></i>
            <span>Daya</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tagihan') }}">
            <i class="fa fa-credit-card"></i>
            <span>Tagihan</span>
            </a>
        </li>
    <hr class="sidebar-divider">
</ul>