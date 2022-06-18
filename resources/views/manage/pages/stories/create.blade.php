@extends('manage.layout')

@section('content')
    <form action="{{ route('manage.stories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @livewire('show-story-type-form', ['defaultType' => request()->get('type') ?? 'post'])
    </form>
@endsection

@section('js')
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <script>
        const easyMDE = new EasyMDE({
            element: document.getElementById('markdown-body'),
            hideIcons: ['side-by-side', 'fullscreen'],
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
@endsection
