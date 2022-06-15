@extends('admin.layout')
@section('content')
<form action="{{ route('admin.stories.update', $story) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @livewire('show-content-type-form', [
        'defaultType' => $story->type->slug,
        'content'     => $story,
    ])
</form>
@endsection
