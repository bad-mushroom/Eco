<div>
    <div class="row">
        @if ($featured)
            @includeIf('storyTypes.' . $featured->type->slug, ['story' => $featured])
        @endif
    </div>

    <div class="row" data-masonry='{"percentPosition": true }'>
        @foreach($stories as $story)
            <div class="col-lg-6">
                @includeIf('storyTypes.' . $story->type->slug)
            </div>
        @endforeach
    </div>

    <nav aria-label="Pagination">
        <hr class="my-0 mb-4" />
        {{ $stories->links() }}
    </nav>
</div>
