<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eco') }}</title>

    <script src="{{ mix('js/app.js', 'themes/ecosphere') }}" defer></script>
    <link href="{{ mix('css/app.css', 'themes/ecosphere') }}" rel="stylesheet">

    @livewireStyles
</head>

<body>
    @include('layouts.navigation')

    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @yield('content')
            </div>
            <div class="col-lg-4">
                @include('layouts.widgetbar')
            </div>
        </div>
    </div>

    @include('layouts.footer')

    @livewireScripts
</body>

</html>
