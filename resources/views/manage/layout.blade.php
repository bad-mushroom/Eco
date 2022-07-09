<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eco</title>

    <link rel="stylesheet" href="/eco/manage/appcss.css">
    @livewireStyles
</head>
<body>
    <div class="wrapper-main">

        <!-- Page Header --------------------------------------- -->
        <nav class="navbar navbar-expand-md top-nav fixed-top-nav p-3 mb-3 border-bottom">
            <div class="container-fluid navigation-top ">

                <!-- Mobile Menu Collapse -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-three-dots text-light"></i>
                </button>

                <!-- Collapse on mobile -->
                <div class="collapse navbar-collapse" id="navbarNav">

                    <!-- Brand / Title -->
                    <a class="navbar-brand text-light" href="{{ route('manage.dashboard') }}">{{ $site_title }}</a>

                    <!-- Navigation Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" target="_blank">View Siie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/bad-mushroom/eco/issues" target="_blank">Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/bad-mushroom/eco/wiki" target="_blank">Documentation</a>
                        </li>
                    </ul>
                </div>

                <!-- Status Icons -->
                <ul class="nav notifications col-sm-8 col-md-auto ms-md-auto me-4 mb-md-0">

                    <!-- Search -->
                    <li class="dropdown notification" style="display:none;">
                        <a class="nav-link" href="#" role="button" id="dropdown-menu-notifications"
                            data-bs-toggle="dropdown" aria-expanded="false" aria-expanded="false">
                            <i class="bs bi-search"></i>
                        </a>
                        <ul class="dropdown-menu notification-dropdown dropdown-menu-md-end"
                            aria-labelledby="dropdown-menu-notifications">
                            <li>
                                <div class="notification-list p-3">
                                    <div class="list-group">
                                        <input type="text" class="form-control mb-3" placeholder="Search...">
                                        <button class="btn btn-primary">Search Everything</button>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- Notificaitons -->
                    <li class="dropdown notification" style="display:none;">
                        <a class="nav-link" href="#" role="button" id="dropdown-menu-notifications"
                            data-bs-toggle="dropdown" aria-expanded="false" aria-expanded="false">
                            <i class="bs bi-bell"></i>
                            <span class="indicator"></span>
                        </a>
                        <ul class="dropdown-menu notification-dropdown  dropdown-menu-md-end"
                            aria-labelledby="dropdown-menu-notifications">
                            <li>
                                <div class="notification-title text-center py-3 bg-light">Notifications</div>
                                <div class="notification-list">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-3">
                                                    <span class="bg-info p-2 text-light rounded-circle">
                                                        <i class="bs bi-bell-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block">
                                                    This is a general notificaiton.
                                                    <div class="text-muted">Just now</div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-2">
                                                    <span class="bg-warning p-2 text-light rounded-circle">
                                                        <i class="bs bi-bell-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block">
                                                    This is a warning.
                                                    <div class="text-muted">2 min ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-2">
                                                    <span class="bg-success p-2 text-light rounded-circle">
                                                        <i class="bs bi-bell-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block">
                                                    This is a good news!
                                                    <div class="text-muted">1 hour ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-2">
                                                    <span class="bg-danger p-2 text-light rounded-circle">
                                                        <i class="bs bi-bell-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block">
                                                    Something went wrong here!
                                                    <div class="text-muted">4 hours ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-2">
                                                    <span class="bg-primary p-2 text-light rounded-circle">
                                                        <i class="bs bi-bell-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block">
                                                    Some other type of alert.
                                                    <div class="text-muted">5 hours ago</div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-center py-2">
                                    <a href="#">View all notifications</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Profile -->
                <div class="dropdown">
                    <a href="#" class="d-block text-decoration-none dropdown-toggle text-light" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/eco/manage/images/avatar.jpg" alt="mdo" width="45" height="45" class="border border-light rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser1">
                        <li>
                            <a class="dropdown-item" href="{{ route('manage.profile') }}"><i class="bs bi-person me-2 text-primary"></i>My Profile</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2 text-danger"></i>Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <!-- End Page Header ----------------------------------- -->

        <!-- Left Sidebar -------------------------------------- -->
        <aside id="sidebarMenu" class="sidebar-left">
            <div class="scroll-sidebar">
                <ul class="nav nav-flush flex-column mb-auto">
                    <li class="sidebar-nav-item">
                        <a href="{{ route('manage.dashboard') }}" class="@if (Route::is('manage.dashboard')) active @endif">
                            <i class="bi bi-house-door"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item disabled">
                        <span class=" submenu-link disabled @if (Route::is('manage.stories.*')) active @endif" data-bs-toggle="dropdown">
                            <i class="bi bi-newspaper"></i>
                            <span>Stories</span>
                        </span>
                        <ul class="submenu dropdown-menu">
                            <li class="sidebar-subnav-title">
                                <span>Stories</span>
                            </li>
                            <li class="sidebar-subnav-item">
                                <a class="sub-nav-link" href="{{ route('manage.stories.index') }}">View all Stories</a>
                            </li>
                            <li class="sidebar-subnav-item">
                                <a class="sub-nav-link" href="{{ route('manage.stories.create') }}">Create Story</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-nav-item disabled">
                        <a href="{{ route('manage.comments.index') }}" class="@if (Route::is('manage.comments.*')) active @endif">
                            <i class="bi bi-chat"></i>
                            <span>Comments</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-item">
                        <a href="{{ route('manage.media.index') }}" class="@if (Route::is('manage.media.*')) active @endif">
                            <i class="bi bi-images"></i>
                            <span>Media</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-item disabled">
                        <span class="submenu-link disabled @if ( Route::is('manage.settings.*') || Route::is('manage.settings')) active @endif" data-bs-toggle="dropdown">
                            <i class="bi bi-gear"></i>
                            <span>Settings</span>
                        </span>
                        <ul class="submenu dropdown-menu">
                            <li class="sidebar-subnav-title">
                                <span>Settings</span>
                            </li>
                            @foreach ($settingTypes as $settingType)
                                <li class="sidebar-subnav-item">
                                    <a class="sub-nav-link" href="{{ route('manage.settings', ['type' => $settingType->slug]) }}">{{ $settingType->label }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="{{ route('manage.themes') }}" class="@if (Route::is('manage.themes.*')) active @endif">
                            <i class="bi bi-palette"></i>
                            <span>Themes</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="{{ route('manage.plugins') }}" class="@if (Route::is('manage.plugins')) active @endif">
                            <i class="bi bi-plugin"></i>
                            <span>Plugins</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End Left Sidebar ---------------------------------- -->

        <!-- Page Content -------------------------------------- -->
        <div class="wrapper-page fixed-top-nav-page-margin">
            <div class="container-fluid px-md-5">
                @yield('content')
            </div>
        </div>
        <!-- End Page Content ---------------------------------- -->

        <!-- Page Footer --------------------------------------- -->
        <footer class="footer mt-auto py-3">
            <div class="container-fluid px-md-5">
                <div class="row">

                    <!-- Social Links -->
                    <div class="col-md-6 d-none d-md-block">
                        <a href="https://github.com/bad-mushroom/eco" target="_blank" class="me-4"><i class="bs bi-github me-2"></i>GitHub</a>
                    </div>

                    <!-- Copyright -->
                    <div class="col-md-6 col-sm-12 text-end">
                        <span class="text-muted">&copy; {{ date('Y') }} {{ $site_title }}</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Page Footer ----------------------------------- -->
    </div>

    <script src="/eco/manage/appjs.js"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
