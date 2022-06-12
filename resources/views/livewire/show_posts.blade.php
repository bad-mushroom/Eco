<div>
    <div class="row">
        @if ($featured)
            <div class="col-lg-12">
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $featured->created_at }}</div>
                        <h2 class="card-title h4">{{ $featured->subject }}</h2>
                        <p class="card-text">{{ $featured->body }}</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
            </div>
        @endif
        
        @foreach($posts as $post)
            <div class="col-lg-6">
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $post->created_at }}</div>
                        <h2 class="card-title h4">{{ $post->subject }}</h2>
                        <p class="card-text">{{ $post->body }}</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <nav aria-label="Pagination">
        <hr class="my-0 mb-4" />
        {{ $posts->links() }}
    </nav>

</div>
