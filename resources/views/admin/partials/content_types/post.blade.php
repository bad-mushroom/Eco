<div class="card">
    <div class="card-body row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="subject" class="form-label required">Subject</label>
                <input type="text" class="form-control" name="subject" value="{{ $content->subject ?? '' }}" id="subject" aria-describedby="subjectHelp">
                <div id="subjectHelp" class="form-text">Title, subject, or headline for this content.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="editor" class="form-label">Summary</label>
                <textarea class="form-control" name="summary" id="editor" style="height: 100px">{{ $content->summary ?? '' }}</textarea>
                <div id="editor-help" class="form-text">A short summary of the content.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="editor" class="form-label">Body</label>
                <textarea class="form-control" name="body" id="editor" style="height: 300px">{{ $content->body ?? '' }}</textarea>
                <div id="editor-help" class="form-text">What do you want to say?</div>
            </div>
        </div>
        <div class="col-lg-6">
            <button type="button" name="preview" class="btn btn-secondary text-light"><i class="fas fa-eye me-2"></i>Preview</button>
        </div>
        <div class="col-lg-6 text-end">
            @if ($content)
                @if ($content->published_at)
                    <button type="submit" name="unpublish" class="btn btn-secondary text-light"><i class="fas fa-cloud me-2"></i>Convert to Draft</button>
                @endif
            @else
                <button type="submit" name="draft" class="btn btn-secondary text-light"><i class="fas fa-cloud me-2"></i>Save Draft</button>
            @endif
            <button type="submit" name="publish" class="btn btn-success text-light"><i class="fas fa-cloud me-2"></i>Save and Publish</button>
        </div>
    </div>
</div>
