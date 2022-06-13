<div>
    <div class="row" data-masonry='{"percentPosition": true }'>
        @if ($featured)
            @includeIf('contentTypes.' . $featured->type->slug)
        @endif

        @foreach($contents as $content)
            <div class="col-lg-6">
                @includeIf('contentTypes.' . $content->type->slug)
            </div>
        @endforeach
    </div>

    <nav aria-label="Pagination">
        <hr class="my-0 mb-4" />
        {{ $contents->links() }}
    </nav>
</div>
