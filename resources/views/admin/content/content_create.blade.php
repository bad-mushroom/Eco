@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', [
    'page_title' => 'New Page',
    'back' => 'admin.content.index',
])
@endsection

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
        theme: 'snow'
    });
    </script>
@endsection
