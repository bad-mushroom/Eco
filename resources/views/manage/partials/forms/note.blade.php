<div class="mb-3">
    <label for="subject" class="form-label required">Subject</label>
    <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" wire:model="subject">
    <div id="subjectHelp" class="form-text"></div>
</div>
<div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea class="form-control" id="body" aria-describedby="bodyHelp" rows="10" wire:model="body"></textarea>
    <div id="bodyHelp" class="small text-muted form-text">Markdown Supported</div>
</div>
