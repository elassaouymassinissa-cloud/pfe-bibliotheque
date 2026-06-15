

</style>
<aside id="sidebar" class="sidebar bg-success">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link active " href="{{ route('admin.dashboard') }}" style="color: black";>
                <i class="bi bi-grid" style="color: black";></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->role->name == 'Admin')
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.categories.index') }}" style="color: black";>
                    <i class="bi bi-diagram-3-fill" style="color: black";></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.roles.index') }}" style="color: black";>
                    <i class="bi bi-person-bounding-box" style="color: black";></i>
                    <span>Roles</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.users.index') }}" style="color: black";>
                    <i class="bi bi-person" style="color: black";></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.books.index') }}" style="color: black";>
                    <i class="bi bi-book" style="color: black";></i>
                    <span>Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.contact.index') }}" style="color: black";>
                    <i class="bi bi-envelope-fill" style="color: black";></i>
                    <span>Contact Us</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.users.profile') }}" style="color: black";>
                    <i class="bi bi-person" style="color: black";></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.borrowed.books') }}" style="color: black;">
                    <i class="bi bi-journal-arrow-down" style="color: black;"></i>
                    <span>Borrowed Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}" style="color: black";>
                    <i class="bi bi-box-arrow-right" style="color: black";></i>
                    <span>Sign Out</span>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{ route('report.form') }}" class="nav-link" style="color: black background:blue;">
                    <i class="bi bi-download"></i> Generate Rapport</a>
            </li>
        @endif

        @if (Auth::user()->role->name == 'Librarian')
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.users.index') }}" style="color: black";>
                    <i class="bi bi-person" style="color: black";></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.books.index') }}" style="color: black";>
                    <i class="bi bi-book" style="color: black";></i>
                    <span>Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.users.profile') }}" style="color: black";>
                    <i class="bi bi-person" style="color: black";></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.borrowed.books') }}" style="color: black;">
                    <i class="bi bi-journal-arrow-down" style="color: black;"></i>
                    <span>Borrowed Books</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}" style="color: black";>
                    <i class="bi bi-box-arrow-right" style="color: black";></i>
                    <span>Sign Out</span>
                </a>
            </li>






            <li class="nav-item">
                <a href="{{ route('report.form') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Rapport</a>
            </li>
        @endif


        @if (Auth::user()->role->name == 'User')
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.books.index') }}" style="color: black";>
                    <i class="bi bi-file" style="color: black";></i>
                    <span>Borrow Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.users.borrowed') }}" style="color: black";>
                    <i class="bi bi-download" style="color: black";></i>
                    <span>My Borrowed Books</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admins.users.profile') }}" style="color:black";>
                    <i class="bi bi-person" style="color: black";></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}" style="color: black";>
                    <i class="bi bi-box-arrow-right" style="color: black";></i>
                    <span>Sign Out</span>
                </a>
            </li>
        @endif
    </ul>

</aside>
