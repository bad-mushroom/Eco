@extends('admin.layout')

@section('content')

@include('admin.partials.page_header', [
    'page_title' => 'Edit ' . $page->subject,
    'back'       => 'admin.content.index',
])

<div class="row">
    <div class="col-lg-9">
        <div class="form-floating">
            <textarea class="form-control" id="floatingTextarea2" style="height: 500px">{{ $page->body }}</textarea>
            <label for="floatingTextarea2">Body</label>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card mb-3">
            <div class="card-header">Meta</div>
            <div class="card-body"><p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Engagement</div>
            <div class="card-body"><p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Tags</div>
            <div class="card-body"><p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p></div>
        </div>
    </div>
</div>
@endsection
