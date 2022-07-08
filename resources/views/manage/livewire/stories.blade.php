<div>
    <section id="stories-filter" class="row mt-3">
        <div class="col-sm">
            <label class="small">Story Type</label>
            <select class="form-control" name="type" wire:model="type">
                <option value="">All Story Types</option>
                @foreach ($storyTypes as $type)
                    <option value="{{ $type->slug }}">{{ $type->label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
            <label class="small">Sort</label>
            <select class="form-control" name="sort" wire:model="sort">
                <option value="published_at_desc">Publish Date (Recent)</option>
                <option value="published_at">Publish Date (Oldest)</option>
                <option value="subject">Title (A-Z)</option>
                <option value="subject_desc">Title (Z-A)</option>
            </select>
        </div>
        <div class="col-sm">
            <label class="small">Status</label>
            <select class="form-control" name="status" wire:model="status">
                <option>All Stories</option>
                <option value="draft">Drafts</option>
                <option value="published">Published</option>
            </select>
        </div>
        <div class="col-sm">
            <label class="small">Per Page</label>
            <select class="form-control" name="per_page" wire:model="perPage">
                <option value="15">15</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </section>

    <div class="row pt-3" data-masonry='{"percentPosition": true }'>
        @forelse ($stories as $story)
            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-2">
                @include('manage.partials.story')
            </div>
        @empty
            <div class="col-12">Doesn't look like there are any stories to show.</div>
        @endforelse

        <div class="col-12">{{ $stories->links() }}</div>
    </div>
</div>
