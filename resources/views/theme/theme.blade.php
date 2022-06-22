<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>{{ $site_title ?? 'Eco' }}</title>

    @yield('links')

    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">

    @include('feed::links')

    @yield('css')
    {{-- <link href="{{ mix('themes/ecosphere/css/app.css', 'eco') }}" rel="stylesheet"> --}}
</head>

    @yield('theme')

</html>
