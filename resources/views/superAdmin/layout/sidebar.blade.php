<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item active ">
            <a href="{{route('superAdmin.dashboard')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Dept Admins</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('admin.list')}}">Dept Admin List</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.create')}}">Create Dept Admin</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Dept</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('dept.list')}}">Dept List</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('dept.create')}}">Add Dept</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Programs</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('program.list')}}">Programs List</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('program.create')}}">Create Program</a>
                </li>
            </ul>
        </li>

    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">

