<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dashboard - Eco Manage</title>

    <link href="{{ mix('manage/css/app.css', 'eco') }}" rel="stylesheet">
    @yield('css')
    @livewireStyles
</head>
<body class="sb-nav-fixed">
    @include('manage.partials.navigation')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
           @include('manage.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('manage.partials.footer')
        </div>
    </div>

    <script src="{{ mix('manage/js/app.js', 'eco') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    @yield('js')
    @livewireScripts
</body>
</html>
