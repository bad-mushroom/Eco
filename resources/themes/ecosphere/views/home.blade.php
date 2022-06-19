@extends('layout')

@section('content')
    <div>
        <div class="row">
            @if ($featured ?? false)
                @includeIf('stories.' . $featured->type->slug, ['story' => $featured])
            @endif
        </div>
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
@endsection
