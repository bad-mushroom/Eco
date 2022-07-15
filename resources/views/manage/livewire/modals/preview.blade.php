<div wire:ignore.self class="modal fade" id="previewStory" tabindex="-1" aria-labelledby="previewStory" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewStoryLabel">Story Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="preview-story-subject">{{ $subject }}</h3>
                <div class="py-2 story-markdown" id="preview-story-summary">{{ $summary }}</div>
                <hr>
                <div id="preview-story-body" class="py-2 story-markdown">{{ $body }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-success text-light">OK</button>
            </div>
        </div>
    </div>
</div>
