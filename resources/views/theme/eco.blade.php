<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('page_description')">
    <meta name="author" content="@yield('page_author')">
    <meta name="generator" content="Eco">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>@yield('page_title', $site_title ?? 'Eco')</title>

    @yield('links')

    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">

    @include('feed::links')

    <link rel="stylesheet" href="/theme/css/theme.css">
</head>
    <body class="@yield('body-styles')">
        @yield('body')
        <script src="/theme/js/theme.js"></script>
        @stack('scripts')
    </body>
</html>
