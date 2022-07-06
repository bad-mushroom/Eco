<div>
    <section id="comments-filter" class="row mt-3">
        <div class="col-sm">
            <label class="small">Sort</label>
            <select class="form-control" name="sort" wire:model="sort">
                <option value="created_at_desc">Posted Date (Recent)</option>
                <option value="created_at">Posted Date (Oldest)</option>
            </select>
        </div>
        <div class="col-sm">
            <label class="small">Status</label>
            <select class="form-control" name="status" wire:model="status">
                <option>All Status</option>
                <option value="pending">Pending</option>
                <option value="approveds">Approved</option>
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
        @forelse ($comments as $comment)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>re: {{ $comment->commentable->subject }}</h5>
                    <div>from <a href="#">{{ $comment->author }}</a></div>
                    <div class="py-2">{{ $comment->body }}</div>
                    <span class="text-dark badge bg-info"></span>
                </div>
                <div class="card-footer">
                    <a href="" title="Delete" class="me-2"><i class="bi bi-trash"></i></a> | <a href="" class="ms-2"
                        title="Spam"><i class="bi bi-flag"></i></a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">Doesn't look like there are any comments to show.</div>
        @endforelse

        <div class="col-12">{{ $comments->links() }}</div>
    </div>
</div>
