{{--
    When building custom themes, use the comments below to guide you.
    Make sure to build all assets in to the `dist` folder.

    Running `php artisan eco:publish-theme-assets` will move any files
    in the `dist` folder for the active theme to the web server's public
    directory.

--}}

{{-- All themes must extend the "eco" parent theme. --}}
@extends('eco')

{{-- Add any additional header data that needs to appear in <head></head>  --}}
@section('head')

@endsection

{{-- CSS styles are "stacked" and included in head. --}}
@push('css')
    <link href="/theme/css/theme.css" rel="stylesheet">
@endpush

{{--
    Your theme must have a "body" section.

    The <body> tag is part of the Eco base theme. If you need to add CSS classes
    to it you can use `@yield('body_styles')` to inject them.

--}}
@section('body')
@section('body_styles')d-flex flex-column min-vh-100 @endsection
    {{-- At this point, your theme configuration is up to you. --}}

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    {{-- JS files are "stacked" and included at the bottom of the page body. --}}
    @push('scripts')
        <script src="/theme/js/app.js"></script>
    @endpush
@endsection
