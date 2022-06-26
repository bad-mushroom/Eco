<article class="blog-post mb-5 bg-light p-3">
    <h2 class="blog-post-title mb-1">{{ $story->subject }}</h2>
    <p class="blog-post-meta">{{ $story->relative_published_at }} by @author($story)</p>

    @foreach ($story->tags as $tag)
    <span class="badge bg-info">{{ $tag->label }}</span>
    @endforeach

    <div class="py-3 story-markdown" id="{{ $story->id }}">{{ $story->summary}}</div>
    @if ($story->body)
        <a href="{{ route('stories.show', ['storyType' => $story->type, 'story' => $story->slug]) }}" class="btn btn-primary">Continue reading</a>
    @endif
</article>
