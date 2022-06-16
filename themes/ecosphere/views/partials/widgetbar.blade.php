<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            @foreach($storyTypes->chunk(2) as $chunk)
            <div class="row">
                @foreach($chunk as $type)
                    <div class="col-md-6">
                    <a href="{{ route('home', ['type' => $type->slug]) }}">{{ Str::plural($type->label) }} ({{ $type->stories_count }})</a>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @foreach ($tags as $tag)
           <a href="{{ route('home', ['tag' => $tag->slug]) }}" class="badge bg-primary text-light text-decoration-none p-2 my-1 mx-1">{{ $tag->label }}</a>
        @endforeach
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and
        feature the Bootstrap 5 card component!</div>
</div>

