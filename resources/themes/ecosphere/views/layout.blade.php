@extends('eco')

@section('css') {{ $css }} @endsection

@section('body')
    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')

    @push('scripts')
        <script
            src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
            integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
            crossorigin="anonymous"
            async>
        </script>
    @endpush
@endsection
