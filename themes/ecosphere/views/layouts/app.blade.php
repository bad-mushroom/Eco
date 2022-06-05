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
    @livewireScripts
</body>

</html>
