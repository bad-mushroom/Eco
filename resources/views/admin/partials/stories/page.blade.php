<div class="card">
    <div class="card-body row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="subject" class="form-label required">Page Title</label>
                <input type="text" class="form-control" name="subject" id="subject" aria-describedby="subjectHelp">
                <div id="subjectHelp" class="form-text">Title, subject, or headline for this page.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="editor" class="form-label">Summary</label>
                <textarea class="form-control" name="summary" id="editor" style="height: 100px"></textarea>
                <div id="editor-help" class="form-text">A short summary of the content.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="markdown-body" class="form-label">Body</label>
                <textarea class="form-control" name="body" id="markdown-body" style="height: 300px"></textarea>
                <div id="editor-help" class="form-text">Full story of the page.</div>
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
