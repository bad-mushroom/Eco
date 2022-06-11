@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', [
    'page_title' => 'Create Content',
    'back'       => 'admin.content.index',
])

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="subject" class="form-label required">Subject</label>
                            <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp">
                            <div id="subjectHelp" class="form-text">Title, subject, or headline for this content.</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="editor" class="form-label">Summary</label>
                            <textarea class="form-control" id="editor" style="height: 100px"></textarea>
                            <div id="editor-help" class="form-text">A short summary of the content.</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="editor" class="form-label">Body</label>
                            <textarea class="form-control" id="editor" style="height: 300px"></textarea>
                            <div id="editor-help" class="form-text">Note that not all content types will support richtext.</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-secondary text-light"><i class="fas fa-eye me-2"></i>Preview</button>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-secondary text-light"><i class="fas fa-cloud me-2"></i>Save Draft</button>
                        <button class="btn btn-success text-light"><i class="fas fa-cloud me-2"></i>Save and Publish</button>
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
