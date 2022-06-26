@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $story->subject }}</h1>
                </header>
                <!-- Preview image figure-->
                @if ($story->featured_image)
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." />
                </figure>
                @endif
                <!-- Post content-->
                <section class="mb-5">
                    {{ $story->body }}
                </section>
            </article>

        </div>

    </div>
</div>
@endsection
