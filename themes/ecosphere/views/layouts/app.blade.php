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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Tags</div>
                    <div class="card-body">
                        @foreach ($tags as $tag)
                           <a href="/content?tag={{ $tag->slug }}">{{ $tag->label }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    @livewireScripts
</body>

</html>
