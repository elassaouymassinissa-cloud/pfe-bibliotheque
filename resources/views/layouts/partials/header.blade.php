
</style>
<header id="header" class="header fixed-top d-flex align-items-center bg-success">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <!-- <i class="bi bi-book" style="font-size: 28px; padding: 5px; color: blue;"></i> -->
            <span class="d-none d-lg-block" style="color:rgb(246, 251, 250)";>Bibliothèque en ligne</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn" style="color:rgb(249, 253, 252)";></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">



            <li class="nav-item dropdown pe-3">
                <!--notifications-->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon position-relative" href="{{ route('notifications') }}">
                    <i class="bi bi-bell" style="font-size: 22px; color:orange;"></i>
                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <span class="badge bg-danger badge-number" style="position: absolute; top: 5px; right: -5px;">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </a>
            </li>

            <!--end notifications-->

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{ Auth::user()->profile_picture_url }}" alt="Profile" class="img-fluid rounded-circle"
                    style="width: 30px; height: 50px;">
                <span class="d-none d-md-block dropdown-toggle ps-2"
                    style="color:rgb(245, 247, 247)";>{{ Auth::user()->user_name }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6 style="color:rgb(245, 248, 247)";>{{ Auth::user()->user_name }}</h6>
                    <span style="color: black";>{{ optional(Auth::user()->role)->name }}</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admins.users.profile') }}">
                        <i class="bi bi-person"></i>
                        <span style="color: black">My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>



                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
