<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">RESTO RAMSKI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RR</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="menu-header">Dashboard</li>
            <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>General Dashboard </span></a>
            </li>
            {{-- Menu --}}
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('users.index') }}"><i class="far fa-user"></i> <span>Users</span></a>
            </li>
        </ul>
    </aside>
</div>
