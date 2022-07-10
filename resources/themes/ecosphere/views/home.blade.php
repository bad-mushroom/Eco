@extends('layout')

@section('content')
    <main class="container">

        <div class="p-4 p-md-5 mb-4 mt-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">{{ setting('site_headline') }}</h1>
                <p class="lead my-3">{{ setting('site_description') }}</p>
            </div>
        </div>

        <div class="row mb-2">
            @foreach (featured_stories() as $story)
                <div class="col-md-6">
                    @if ($story->featured_image)
                        <img src="data:image/png;base64,{{ $story->featured_image }}" alt="{{ $story->subject }}">
                    @endif
                    @includeIf('stories.' . $story->type->slug)
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row" data-masonry='{"percentPosition": true }'>
            @forelse (stories() as $story)
                <div class="col-sm-6 col-lg-4 mb-4">
                    @includeIf('stories.' . $story->type->slug)
                </div>
            @empty
                <p>Sorry... there's nothing to see here yet</p>
            @endforelse
        </div>
        {{ stories()->links() }}
    </main>
@endsection

@push('scripts')
<script
    src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
    crossorigin="anonymous"
    async>
</script>
@endpush
