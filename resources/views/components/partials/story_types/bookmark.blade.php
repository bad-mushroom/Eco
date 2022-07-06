@props([
'story' => null
])

<div class="card mb-4">
    <div class="card-body">
        <h5>{{ $story->subject }} @if (!$story->published_at) - <span class="text-warning">Draft</span> @endif </h5>
        @if ($story->published_at) <div class="text-muted small">{{ $story->relative_published_at }}</div> @endif
        <div class="py-2"><a href="{{ $slot }}">{{ $slot }}</a></div>
        <span class="text-light badge bg-secondary"><i class="bi bi-link me-2"></i>{{ $story->type->label }}</span>
    </div>
    <div class="card-footer">
        <a href="{{ route('manage.stories.edit', $story) }}" title="Edit"><i class="bi bi-pencil"></i></a>
    </div>
</div>
