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

    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">
    @include('feed::links')

    @stack('css')
</head>
<body class="@yield('body_styles', '')">
    @yield('body')

    @stack('scripts')
</body>
</html>
