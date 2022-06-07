@extends('layouts.app')

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <div class="post-preview">

                    <h2 class="post-title">{{ $content->subject }}</h2>

                <p class="post-meta">
                    Posted by
                    <a href="#!">{{ $content->author->name }}</a>
                    on {{ $content->created_at }}
                </p>
            </div>
            {{ $content->body }}
        </div>
    </div>
</div>
@endsection
