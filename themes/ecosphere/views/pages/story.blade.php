@extends('layout')

@section('content')

<article class="h-entry">
    <header class="mb-4">
        <h1 class="fw-bolder mb-1 h-title">{{ $story->subject }}</h1>

        <div class="text-muted fst-italic mb-2">Posted <span class="dt-published">{{ $story->relative_published_at }}</span> by @author($story)</div>

        @foreach ($story->tags as $tag)
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $tag->label }}</a>
        @endforeach
    </header>

    @if ($story->featured_image)
        <figure class="mb-4">
            <img class="card-img-top u-image" src="data:image/png;base64,{{ $story->featured_image }}" alt="{{ $story->subject }}" />
        </figure>
    @endif

    <section class="mb-5 e-content">
        {{ $story->body }}
    </section>
</article>

@include('partials.comments')
@endsection
