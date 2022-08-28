<ul class="sidebar-menu">
    <li class="menu-header">MAIN MENU</li>
    <li class="{{ ($title == 'Dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>

    <li class="dropdown {{ ($title == 'Roles') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-lock"></i> <span>Role And Permission</span></a>
        <ul class="dropdown-menu">
            <li class="{{ ($title == 'Roles') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li><a class="nav-link" href="{{ route('permissions.index') }}">Permission</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
</ul>