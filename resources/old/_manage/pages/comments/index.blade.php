@extends('manage.layout')

@section('content')
    @include('manage.partials.container_header', ['page_title' => 'Comments'])
    @livewire('comments')
@endsection
