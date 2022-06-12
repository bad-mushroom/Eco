<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Eco Admin</title>
    <link href="/admin/css/app.css" rel="stylesheet" />
    @yield('css')
</head>
<body class="sb-nav-fixed">
    @include('admin.partials.navigation')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
           @include('admin.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
               @yield('content')
            </main>
            @include('admin.partials.footer')
        </div>
    </div>

    <script src="/admin/js/app.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
