<div class="card mb-4 h-entry">
    @if ($story->featured_image)
    <img class="card-img-top" src="data:image/png;base64,{{ $story->featured_image }}" alt="{{ $story->subject }}" />
    @endif

    <div class="card-body">
        <h2 class="card-title h4 h-title">{{ $story->subject }}</h2>
        <p class="card-text p-summary">{{ $story->summary }}</p>
    </div>
</div>
