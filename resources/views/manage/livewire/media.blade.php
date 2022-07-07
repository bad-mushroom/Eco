<div>
    @include('livewire.modals.confirm_delete', [
        'confirmTitle' => 'Delete File?',
        'confirmBody'  => 'Are you sure you want to delete this file?',
    ])

    @include('livewire.modals.upload')

    <section id="comments-filter" class="row mt-3">
        <div class="col-sm">
            <label class="small">Sort</label>
            <select class="form-control" name="sort" wire:model="sort">
                <option value="created_at_desc">Added Date (Recent)</option>
                <option value="created_at">Added Date (Oldest)</option>
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
        @forelse ($media as $medium)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card mb-4">
                <div class="card-body row">
                    <div class="col-3">
                       <div class="p-3 bg-light text-primary  text-center rounded">
                            <i class="bi bi-archive fs-3"></i>
                       </div>
                    </div>
                    <div class="col-9">
                        <div class="pb-2 fw-bold">{{ $medium->label }}</div>
                        <div>Size: <span class="text-muted">{{ $medium->readableFileSize }}</span></div>
                        <div>Type: <span class="text-muted">{{ $medium->mime }}</span></div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $medium->filename }}
                </div>
                <div class="card-footer">
                    <a href="#" title="Delete" class="me-2" wire:click="setDeleteId('{{ $medium->id }}')" data-bs-toggle="modal"
                        data-bs-target="#confirmDelete"><i class="bi bi-trash"></i></a>
                    <a href="#" title="Download" class="me-2"><i class="bi bi-cloud-arrow-down"></i></a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">Doesn't look like there are any file to show.</div>
        @endforelse

        <div class="col-12">{{ $media->links() }}</div>
    </div>
</div>
