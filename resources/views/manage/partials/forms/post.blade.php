<div class="mb-3">
    <label for="subject" class="form-label required">Subject</label>
    <input type="text" class="form-control @error('subject') border border-danger @enderror" id="subject" aria-describedby="subjectHelp" wire:model="subject">
    <div id="subjectHelp" class="form-text"></div>
</div>

<div class="mb-3">
    <label for="summary" class="form-label">Summary</label>
    @error('summary') <span class="text-danger">{{ $message }}</span> @enderror
    <textarea class="form-control @error('summary') border border-danger @enderror" id="summary" aria-describedby="subjectHelp" rows="2" wire:model="summary"></textarea>
    <div id="summaryHelp" class="form-text"></div>
</div>

<div class="mb-3">
    <label for="body" class="form-label">Blog Post</label>
    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    <textarea class="form-control @error('body') border border-danger @enderror" id="body" aria-describedby="bodyHelp" rows="10" wire:model="body"></textarea>
    <div id="bodyHelp" class="form-text"></div>
</div>
