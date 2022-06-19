<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $site_title ?? 'Eco' }}</title>

    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">

    @include('feed::links')

    <link href="{{ mix('themes/ecosphere/css/app.css', 'eco') }}" rel="stylesheet">

    @livewireStyles
</head>

<body class="d-flex flex-column min-vh-100">
    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')

    <script src="{{ mix('themes/ecosphere/js/app.js', 'eco') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
        crossorigin="anonymous"
        async>
    </script>
    @yield('js')
    @livewireScripts
</body>

</html>
