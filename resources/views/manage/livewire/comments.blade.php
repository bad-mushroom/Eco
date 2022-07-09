<div>
    @include('manage.livewire.modals.confirm_delete', ['confirmTitle' => 'Delete Comment?', 'confirmBody' => 'Are you sure you want to delete this comment?'])
    @include('manage.livewire.modals.confirm_approve', ['confirmTitle' => 'Approve Comment?', 'confirmBody' => 'Are you sure you want to approve this comment?'])

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
                    <a href="#" title="Delete" class="me-2" wire:click="setDeleteId('{{ $comment->id }}')" data-bs-toggle="modal" data-bs-target="#confirmDelete"><i class="bi bi-trash"></i></a>
                    @if (!$comment->is_approved)
                        <a href="#" title="Approve" class="me-2" wire:click="setApproveId('{{ $comment->id }}')" data-bs-toggle="modal" data-bs-target="#confirmApprove"><i class="bi bi-check"></i></a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">Doesn't look like there are any comments to show.</div>
        @endforelse

        <div class="col-12">{{ $comments->links() }}</div>
    </div>
</div>
