@extends('layout')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $story->subject }}!</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted {{ $story->relative_published_at }} by @author($story)</div>
                    <!-- Post categories-->
                    @foreach ($story->tags as $tag)
                    <span class="badge bg-info">{{ $tag->label }}</span>
                    @endforeach
                </header>
                <!-- Preview image figure-->
                @if ($story->featured_image)
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." />
                    </figure>
                @endif
                <!-- Post content-->
                <section class="mb-3 story-markdown" id="{{ $story->id }}-summary">
                    {{ $story->summary }}
                </section>
                <hr>
                <section class="mb-5 story-markdown" id="{{ $story->id }}-body">
                    {{ $story->body }}
                </section>
            </article>

        </div>
    </div>
</div>
@endsection
