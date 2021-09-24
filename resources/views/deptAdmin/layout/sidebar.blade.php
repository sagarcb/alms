<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item active ">
            <a href="index.html" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Events</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('event.view')}}">Events List</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('event.create')}}">Create Event</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Notices</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('notice.view')}}">Notice List</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('notice.create')}}">Create Notice</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Alumni</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('alumni.request.view')}}">New Alumni request List</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('alumni.approved.view')}}">Alumni Approved List</a>
                </li>
                <li class="submenu-item">
                    <a href="{{route('alumni.cv.list')}}">Alumni CV</a>
                </li>
                <li class="submenu-item">
                    <a href="{{route('alumni.posts.list')}}">Alumni Posts</a>
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
