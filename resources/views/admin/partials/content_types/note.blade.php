<div class="card">
    <div class="card-body row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="subject" class="form-label required">Title</label>
                <input type="text" name="subject" class="form-control" id="subject" value="{{ $story->subject ?? '' }}"aria-describedby="subjectHelp">
                <div id="subjectHelp" class="form-text">Title for this note.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="editor" class="form-label">Note</label>
                <textarea class="form-control" name="body" id="editor" style="height: 100px">{{ $story->body ?? '' }}</textarea>
                <div id="editor-help" class="form-text">Notes should be short and concise and will often lack full context.</div>
            </div>
        </div>
        <div class="col-lg-6">
            <button type="button" name="preview" class="btn btn-secondary text-light"><i class="fas fa-eye me-2"></i>Preview</button>
        </div>
        <div class="col-lg-6 text-end">
            <button type="submit" name="draft" class="btn btn-secondary text-light"><i class="fas fa-cloud me-2"></i>Save Draft</button>
            <button type="submit" name="publish" class="btn btn-success text-light"><i class="fas fa-cloud me-2"></i>Save and Publish</button>
        </div>
    </div>
</div>
