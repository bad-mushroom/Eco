@extends('admin.layout')
@section('content')
<form action="{{ route('admin.stories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @livewire('show-story-type-form', ['defaultType' => request()->get('type') ?? 'post'])
</form>
@endsection
