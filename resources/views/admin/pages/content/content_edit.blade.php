@extends('admin.layout')
@section('content')
<form action="{{ route('admin.content.update', $content) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @livewire('show-content-type-form', [
        'defaultType' => $content->type->slug,
        'content'     => $content,
    ])
</form>
@endsection
