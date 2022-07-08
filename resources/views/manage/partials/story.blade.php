<div class="card mb-4">
    @if ($story->featured_image)
    <img src="..." class="card-img-top" alt="...">
    @endif
    <div class="card-body">
        <h5>{{ $story->subject }}</h5>
        @if ($story->published_at)
            <div class="text-muted small">{{ $story->relative_published_at }}</div>
        @endif
        <div class="py-2">{{ Str::limit($story->summary, 200) }}</div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('manage.stories.edit', $story) }}" class="me-2" title="Edit"><i class="bi bi-pencil"></i></a> | <a href="{{ route('manage.comments.index', ['story' => $story->id]) }}" class="ms-2" title="Comments"><i class="bi bi-chat"></i></a>
            </div>
            <div class="col-6 text-end">
                <span class="text-dark badge bg-info"><i class="bi bi-newspaper me-2"></i>{{ $story->type->label }}</span>
                @if (!$story->published_at) <span class="text-dark badge bg-warning">Draft</span> @endif
            </div>
        </div>
    </div>
</div>
