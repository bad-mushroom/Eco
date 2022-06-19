@extends('layout')

@section('content')

    <header class="py-5 bg-primary text-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">{{ $site_title }}</h1>
                <p class="lead mb-0">{{ $site_headline }}</p>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if ($featuredStories ?? false)
                    @foreach($featuredStories as $featured)
                        <div class="row">
                            <div class="col-12">
                                @includeIf('stories.' . $featured->type->slug, ['story' => $featured])
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="row" data-masonry='{"percentPosition": true }'>
                    @forelse($stories as $story)
                        <div class="col-lg-6">
                            @includeIf('stories.' . $story->type->slug)
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    I'll think of something to say real soon! Still getting set up here :)
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <nav aria-label="Pagination">
                    <hr class="my-2 mb-4" />
                    {{ $stories->links() }}
                </nav>
            </div>
            <div class="col-lg-4">
                @include('partials.widgetbar')
            </div>
        </div>
    </div>

@endsection
