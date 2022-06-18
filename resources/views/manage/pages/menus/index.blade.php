@extends('manage.layout')

@section('content')
    @include('manage.partials.container_header', ['page_title' => 'Navigation Menus'])
    @livewire('menus')
@endsection
