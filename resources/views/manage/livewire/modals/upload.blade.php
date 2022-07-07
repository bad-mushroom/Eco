
    <div wire:ignore.self class="modal fade" id="mediaUpload" tabindex="-1" aria-labelledby="mediaUpload" aria-hidden="true">
        <form wire:submit.prevent="save">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediaUploadLabel">Media Upload</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="label" class="form-label required">Name</label>
                            <input type="text" class="form-control" id="label" aria-describedby="labelHelp" wire:model="label">
                            <div id="labelHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" aria-describedby="Help" wire:model="description">
                            <div id="descriptionHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label required">File</label>
                            <input type="file" class="form-control" wire:model="upload">
                        </div>


                        <div wire:loading wire:target="upload">Uploading...</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

