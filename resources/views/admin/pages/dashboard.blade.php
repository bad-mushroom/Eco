@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Dashboard'])

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <x-widget label="Pending Comments" icon="fas fa-comments" value="{{ $totals['comments'] }}" type="primary" />
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <x-widget label="Total Tags" icon="fas fa-tag" value="{{ $totals['tags'] }}" type="success" />
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <x-widget label="Total Stories" icon="fas fa-file-lines" value="{{ $totals['stories'] }}" type="primary" />
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-5 col-md-6 mb-4">
            <x-card header="Quick Note">
                <x-slot:body>
                    <form action="{{ route('admin.stories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.partials.stories.note', ['story' => null])
                    </form>
                </x-slot:body>
            </x-card>
        </div>
        <div class="col-xl-7 col-md-6 mb-4">
            <x-card header="Recent Stories">
                <x-slot:body>
                    <ul class="list-group list-group-flush">
                        @forelse($recentStories as $story)
                            <li class="list-group-item">
                                <i class="me-2 fs-5 @if ($story->published_at) text-primary @else text-muted @endif fas fa-{{ $story->type->icon ?? 'file' }}"></i>
                                <a href="{{ route('admin.stories.edit', ['story' => $story]) }}" class="text-decoration-none me-4 fs-5">{{ $story->subject }}</a>
                                <div class="py-1"><em class="text-muted">{{ Str::limit($story->summary ?? $story->body, 50, '...') }}</em></div>
                            </li>
                        @empty
                            <li class="list-group-item">No stories to display</li>
                        @endforelse
                    </ul>
                </x-slot:body>
            </x-card>
        </div>
    </div>
</div>

@endsection
