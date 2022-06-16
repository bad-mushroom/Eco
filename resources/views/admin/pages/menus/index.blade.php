@extends('admin.layout')

@section('content')
    @include('admin.partials.container_header', ['page_title' => 'Navigation Menus'])
    @livewire('menus')
@endsection
