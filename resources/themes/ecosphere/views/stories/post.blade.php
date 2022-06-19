<div class="card mb-4 h-entry">
    @if ($story->featured_image)
        <img class="card-img-top" src="data:image/png;base64,{{ $story->featured_image }}" alt="{{ $story->subject }}" />
    @endif

    <div class="card-body">
        <div class="small text-muted">
            <span class="dt-published">{{ $story->relative_published_at }}</span> by @author($story)
        </div>
        <h2 class="card-title h4 h-title">{{ $story->subject }}</h2>
        <p class="card-text p-summary">{{ $story->summary }}</p>
        <a class="btn btn-primary text-light" href="{{ route('stories.show', ['storyType' => $story->type, 'story' => $story->slug]) }}">Read more →</a>
    </div>
</div>
