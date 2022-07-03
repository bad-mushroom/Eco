@extends('manage.layout')

@section('content')
    @include('manage.partials.container_header', ['page_title' => 'Media Library'])
    @livewire('library')
@endsection
