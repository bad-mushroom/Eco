<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eco</title>
    <link rel="stylesheet" href="/eco/manage/appcss.css">
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
                    <a class="navbar-brand text-light" href="#">Dharma</a>

                    <!-- Navigation Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>

                </div>

                <!-- Status Icons -->
                <ul class="nav notifications col-sm-8 col-md-auto ms-md-auto me-4 mb-md-0">

                    <!-- Search -->
                    <li class="dropdown notification">
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
                    <li class="dropdown notification">
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

                    <!-- Messages -->
                    <li class="dropdown notification">
                        <a class="nav-link" href="#" role="button" id="notification-menu-messages" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-expanded="false">
                            <i class="bs bi-chat"></i>
                            <span class="indicator"></span>
                        </a>
                        <ul class="dropdown-menu notification-dropdown  dropdown-menu-md-end"
                            aria-labelledby="notification-menu-messages">
                            <li>
                                <div class="notification-title text-center py-3 bg-light">Messages</div>
                                <div class="notification-list">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action unread">
                                            <div class="notification-info">
                                                <div class="float-start mt-3">
                                                    <span class="bg-primary p-2 text-light rounded-circle">
                                                        <i class="bs bi-chat-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block">
                                                    <span class="text-warning">Woody</span> sent you a message.
                                                    <p>Hi! Just checking in to see you wanted...</p>
                                                    <div class="text-muted">Just now</div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-3">
                                                    <span class="bg-secondary p-2 text-light rounded-circle">
                                                        <i class="bs bi-chat-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block text-muted">
                                                    <span class="text-warning">Buzzlight Year</span> sent you a
                                                    message.
                                                    <p>I was hoping we could go to infinity and...</p>
                                                    <div class="text-muted">4 hours ago</div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="float-start mt-3">
                                                    <span class="bg-secondary p-2 text-light rounded-circle">
                                                        <i class="bs bi-chat-fill"></i>
                                                    </span>
                                                </div>
                                                <div class="notification-list-alert-block text-muted">
                                                    <span class="text-warning">LiTitle Bo Peep</span> sent you a
                                                    message.
                                                    <p>Sorry, I can't make it tonight.</p>
                                                    <div class="text-muted">Yesterday</div>
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
                    <a href="#" class="d-block text-decoration-none dropdown-toggle text-light" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/eco/manage/images/avatar.jpg" alt="mdo" width="45" height="45"
                            class="border border-light rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">
                                <i class="bs bi-gear me-2 text-primary"></i>Preferences</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bs bi-person me-2 text-primary"></i>My
                                Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2 text-danger"></i>Sign
                                out</a></li>
                    </ul>
                </div>


            </div>

        </nav>
        <!-- End Page Header ----------------------------------- -->

        <!-- Left Sidebar -------------------------------------- -->
        <aside id="sidebarMenu" class="sidebar-left">
            <div class="scroll-sidebar">
                <ul class="nav nav-flush flex-column mb-auto">
                    <li class="sidebar-nav-item">
                        <a href="index.html">
                            <i class="bi bi-house-door"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="elements.html" class="active">
                            <i class="bi bi-box"></i>
                            <span class="nav-label">Elements</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item disabled">
                        <span class=" submenu-link disabled" data-bs-toggle="dropdown">
                            <i class="bi bi-map"></i>
                            <span>Submenu</span>
                        </span>
                        <ul class="submenu dropdown-menu">
                            <li class="sidebar-subnav-title">
                                <span>Submenu Items</span>
                            </li>
                            <li class="sidebar-subnav-item">
                                <a class="sub-nav-link" href="#">Submenu Item 1</a>
                            </li>
                            <li class="sidebar-subnav-item">
                                <a class="sub-nav-link" href="#">Submenu Item 2</a>
                            </li>
                            <li class="sidebar-subnav-item">
                                <a class="sub-nav-link" href="#">Submenu Item 3</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="tables.html">
                            <i class="bi bi-table"></i>
                            <span class="nav-label">Tables</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="blank.html">
                            <i class="bi bi-file"></i>
                            <span>Blank</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <i class="bi bi-people"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-nav-item">
                        <a href="#">
                            <i class="bi bi-sliders"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End Left Sidebar ---------------------------------- -->

        <!-- Page Content -------------------------------------- -->
        <div class="wrapper-page fixed-top-nav-page-margin">
            <div class="container-fluid px-md-5">



                <!-- Content -->
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
                        <a href="#" class="me-4"><i class="bs bi-github me-2"></i>GitHub</a>
                        <a href="#" class="me-4"><i class="bs bi-twitter me-2"></i>Twitter</a>
                        <a href="#" class="me-4"><i class="bs bi-instagram me-2"></i>Instagram</a>
                    </div>

                    <!-- Copyright -->
                    <div class="col-md-6 col-sm-12 text-end">
                        <span class="text-muted">&copy; 2022 Dharma Themes</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Page Footer ----------------------------------- -->
    </div>
    <script src="/eco/manage/appjs.js"></script>
</body>
</html>
