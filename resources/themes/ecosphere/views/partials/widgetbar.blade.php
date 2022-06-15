<!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Enter search term..."
                aria-label="Enter search term..." aria-describedby="button-search" />
            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            @foreach($contentTypes->chunk(2) as $chunk)
            <div class="row">
                @foreach($chunk as $type)
                <div class="col-md-6">
                   <a href="#">{{ Str::plural($type->label) }} ({{ $type->contents_count }})</a>
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
           <span class="badge bg-primary text-light p-2 my-1 mx-1 fs-5">{{ $tag->label }}</span>
        @endforeach
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and
        feature the Bootstrap 5 card component!</div>
</div>

