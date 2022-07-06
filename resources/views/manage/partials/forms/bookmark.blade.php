<div class="mb-3">
    <label for="subject" class="form-label required">Name</label>
    <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" value="{{ optional($story ?? null)->subject }}">
    <div id="subjectHelp" class="form-text"></div>
</div>
<div class="mb-3">
    <label for="summary" class="form-label">URL</label>
    <input type="url" class="form-control" id="summary" aria-describedby="subjectHelp" value="{{ optional($story ?? null)->summary }}">
    <div id="summaryHelp" class="form-text"></div>
</div>

