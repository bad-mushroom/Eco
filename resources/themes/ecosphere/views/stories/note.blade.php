<div class="card mb-4">
    <div class="card-body">
        <div class="small text-muted">{{ $story->relative_published_at }}</div>
        <h2 class="card-title h4 h-title">{{ $story->subject }}</h2>
        <div class="card-text story-markdown" id="{{ $story->id }}">{{ $story->summary }}</div>
    </div>
</div>
