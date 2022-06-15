@extends('admin.layout')
@section('content')
<form action="{{ route('admin.stories.update', $story) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @livewire('show-story-type-form', [
        'defaultType' => $story->type->slug,
        'story'     => $story,
    ])
</form>
@endsection
