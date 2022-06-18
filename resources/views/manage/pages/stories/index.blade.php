@extends('manage.layout')

@section('content')
    @include('manage.partials.container_header', ['page_title' => 'Stories <em>' . Str::plural(optional($selectedType ?? false)->label) . '</em>'])
    @livewire('stories')
@endsection
