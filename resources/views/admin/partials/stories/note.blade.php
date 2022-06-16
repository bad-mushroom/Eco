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
                <label for="summary" class="form-label">Note</label>
                <textarea class="form-control" name="summary" id="summary" style="height: 100px">{{ $story->summary ?? '' }}</textarea>
                <div id="editor-help" class="form-text">Notes should be short and concise and will often lack full context.</div>
            </div>
        </div>
        @include('admin.partials.form_buttons')
    </div>
</div>
