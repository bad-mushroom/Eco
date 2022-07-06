@props([
'story' => null
])

<div class="card mb-4">
    @if ($story->featured_image)
        <img src="..." class="card-img-top" alt="...">
    @endif
    <div class="card-body">
        <h5>{{ $story->subject }} @if (!$story->published_at) - <span class="text-warning">Draft</span> @endif </h5>
        @if ($story->published_at) <div class="text-muted small">{{ $story->relative_published_at }}</div> @endif
        <div class="py-2">{{ Str::limit($slot, 100) }}</div>
        <span class="text-light badge bg-secondary"><i class="bi bi-newspaper me-2"></i>{{ $story->type->label }}</span>
    </div>
    <div class="card-footer">
        <a href="{{ route('manage.stories.edit', $story) }}" class="me-2" title="Edit"><i class="bi bi-pencil"></i></a> |
        <a href="{{ route('manage.comments.index', ['story' => $story->id]) }}" class="ms-2" title="Comments"><i class="bi bi-chat"></i></a>
    </div>
</div>
