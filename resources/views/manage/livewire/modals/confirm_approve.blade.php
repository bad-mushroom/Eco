<div wire:ignore.self class="modal fade" id="confirmApprove" tabindex="-1" aria-labelledby="confirmApprove" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmApproveLabel">{{ $confirmTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $confirmBody }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" wire:click.prevent="approve()" data-bs-dismiss="modal" class="btn btn-success text-light">Yes</button>
            </div>
        </div>
    </div>
</div>
