<div class="card mb-4">
    @if ($story->featured_image)
        <a href="#!"><img class="card-img-top" src="data:image/png;base64,{{ $story->featured_image }}" alt="{{ $story->subject }}" /></a>
    @endif
    <div class="card-body">
        <div class="small text-muted">{{ $story->relative_published_at }} by {{ $story->author->name }}</div>
        <h2 class="card-title h4">{{ $story->subject }}</h2>
        <p class="card-text">{{ $story->summary }}</p>
        <a class="btn btn-primary" href="{{ route('stories.show', ['storyType' => $story->type, 'story' => $story->slug]) }}">Read more →</a>
    </div>
</div>
