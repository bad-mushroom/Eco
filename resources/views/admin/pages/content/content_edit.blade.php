@extends('admin.layout')

@section('content')

@include('admin.partials.container_header', [
    'page_title' => 'Edit <em>' . $content->subject . '</em>',
    'back'       => 'admin.content.index',
])
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $content->subject }}">
                            <div id="emailHelp" class="form-text">Title, subject, or headline for this content.</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="editor" class="form-label">Body</label>
                            <textarea class="form-control" id="editor" style="height: 200px">{{ $content->body }}</textarea>
                            <div id="editor-help" class="form-text">Note that not all content types will support
                                richtext.</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-secondary text-light"><i class="fas fa-eye me-2"></i>Preview Changes</button>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-success text-light">
                            <i class="fas fa-cloud me-2"></i>Save Changes and Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            @include('admin.pages.content.content_sidebar')
        </div>
    </div>
</div>
@endsection
