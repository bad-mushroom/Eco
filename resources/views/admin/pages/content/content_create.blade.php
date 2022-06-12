@extends('admin.layout')
@section('content')
<form action="{{ route('admin.content.store') }}" method="post">
    @csrf
    @livewire('show-content-type-form', ['defaultType' => request()->get('type') ?? 'post'])
</form>
@endsection
