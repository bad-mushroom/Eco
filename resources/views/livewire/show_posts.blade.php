
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">{{ $post->subject }}</h2>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{ $post->author->name }}</a>
                        on {{ $post->created_at }}
                    </p>
                </div>

                <hr class="my-4" />
            @endforeach

            {{ $posts->links() }}

        </div>
    </div>
</div>

