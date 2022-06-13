<div class="card mb-4">
    @if ($content->featured_image)
        <a href="#!"><img class="card-img-top" src="data:image/png;base64,{{ $content->featured_image }}" alt="{{ $content->subject }}" /></a>
    @endif
    <div class="card-body">
        <div class="small text-muted">{{ $content->relative_published_at }}</div>
        <h2 class="card-title h4">{{ $content->subject }}</h2>
        <p class="card-text">{{ $content->summary }}</p>
        <a class="btn btn-primary" href="#!">Read more →</a>
    </div>
</div>
