<div class="card mb-4">
    <div class="card-body">
        <div class="small text-muted">{{ $story->relative_published_at }}</div>
        <h2 class="card-title h4 h-title">{{ $story->subject }}</h2>
        <h2 class="card-title h4">{!! nl2br($story->summary) !!}</h2>
        <p class="card-text" id="story-body">{{ $story->body }}</p>
    </div>
</div>
@section('js')
<script src="https://unpkg.com/showdown/dist/showdown.min.js"></script>
<script>
    var converter = new showdown.Converter();
        document.getElementById('story-body').innerHTML = converter.makeHtml(document.getElementById('story-body').innerHTML);
</script>
@endsection
