@extends('layout')

@section('content')

<article>
    <header class="mb-4">
        <h1 class="fw-bolder mb-1">{{ $story->subject }}</h1>

        <div class="text-muted fst-italic mb-2">Posted {{ $story->relative_published_at }} by {{ $story->author->name }}</div>

        @foreach ($story->tags as $tag)
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $tag->label }}</a>
        @endforeach
    </header>
    @if ($story->featured_image)
        <figure class="mb-4">
            <img class="card-img-top" src="data:image/png;base64,{{ $story->featured_image }}" alt="{{ $story->subject }}" />
        </figure>
    @endif

    <section class="mb-5">
        {{ $story->body }}
    </section>
</article>

@include('partials.comments')
@endsection
