<div class="card">
    <div class="card-body row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="subject" class="form-label required">Subject</label>
                <input type="text" class="form-control" name="subject" value="{{ $story->subject ?? '' }}" id="subject" aria-describedby="subjectHelp">
                <div id="subjectHelp" class="form-text">Title, subject, or headline for this content.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="editor" class="form-label">Summary</label>
                <textarea class="form-control" name="summary" id="editor" style="height: 100px">{{ $story->summary ?? '' }}</textarea>
                <div id="editor-help" class="form-text">A short summary of the content.</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="markdown-body" class="form-label">Body</label>
                <textarea class="form-control" name="body" id="markdown-body" style="height: 300px">{{ $story->body ?? '' }}</textarea>
            </div>
        </div>
        @include('manage.partials.form_buttons')
    </div>
</div>
