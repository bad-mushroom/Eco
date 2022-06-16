<div class="card mb-4">
    <div class="card-body">
        <div class="small text-muted">{{ $story->relative_published_at }}</div>
        <h2 class="card-title h4">{!! nl2br($story->summary) !!}</h2>
        <p class="card-text">{{ $story->body }}</p>
    </div>
</div>
