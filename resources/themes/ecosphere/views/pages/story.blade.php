@extends('layout')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <article class="h-entry">
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1 h-title">{{ $story->subject }}</h1>
                            <div class="small text-muted pb-3">
                                <span class="dt-published">{{ $story->relative_published_at }}</span> by @author($story)
                            </div>
                            @foreach ($story->tags as $tag)
                                <a class="badge bg-primary text-decoration-none link-light" href="#!">{{ $tag->label }}</a>
                            @endforeach
                        </header>

                        @if ($story->featured_image)
                        <figure class="mb-4">
                            <img class="card-img-top u-image" src="data:image/png;base64,{{ $story->featured_image }}"
                                alt="{{ $story->subject }}" />
                        </figure>
                        @endif

                        <section class="mb-5 e-content" id="story-body">{{ $story->body }}</section>
                    </article>
                </div>
            </div>

            @include('partials.comments')

        </div>
        <div class="col-lg-4">
            @include('partials.widgetbar')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://unpkg.com/showdown/dist/showdown.min.js"></script>
    <script>
        var converter = new showdown.Converter();
        document.getElementById('story-body').innerHTML = converter.makeHtml(document.getElementById('story-body').innerHTML);
    </script>
@endsection
