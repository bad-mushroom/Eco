<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('page_description')">
    <meta name="author" content="@yield('page_author')">
    <meta name="generator" content="Eco">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')

    <title>@yield('page_title', $site_title ?? 'Eco')</title>

    <link rel="alternate" type="application/atom+xml" title="{{ $site_title ?? 'Eco' }} Feed" href="{{ route('feeds.main') }}">
    @include('feed::links')

    @stack('css')
</head>
<body class="@yield('body_styles', '')">
    @yield('body')

    @stack('scripts')
    <script src="https://unpkg.com/showdown/dist/showdown.min.js"></script>
    <script>
        let converter = new showdown.Converter();
        let stories = document.getElementsByClassName('story-markdown');

        for (let i = 0; i < stories.length; i++) {
            let el = document.getElementById(stories[i].id);
            el.innerHTML = converter.makeHtml(el['innerHTML']);
        }
    </script>
</body>
</html>
