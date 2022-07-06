<div class="mb-3">
    <label for="subject" class="form-label required">Subject</label>
    <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" value="{{ optional($story ?? null)->subject }}">
    <div id="subjectHelp" class="form-text"></div>
</div>
<div class="mb-3">
    <label for="summary" class="form-label">Summary</label>
    <textarea class="form-control" id="summary" aria-describedby="subjectHelp" rows="2">{{ optional($story ?? null)->summary }}</textarea>
    <div id="summaryHelp" class="form-text"></div>
</div>
<div class="mb-3">
    <label for="body" class="form-label">Blog Post</label>
    <textarea class="form-control" id="body" aria-describedby="bodyHelp" rows="10">{{ optional($story ?? null)->body }}</textarea>
    <div id="bodyHelp" class="form-text"></div>
</div>

