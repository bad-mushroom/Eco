@extends('manage.layout')

@section('content')
@include('manage.partials.container_header', ['page_title' => 'Dashboard'])

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('manage.comments.index', ['approved' => 0]) }}" class="text-decoration-none">
                <x-widget label="Pending Comments" icon="fas fa-comments" value="{{ $totals['comments'] }}" type="primary" />
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('manage.stories.index') }}" class="text-decoration-none">
                <x-widget label="Total Stories" icon="fas fa-file-lines" value="{{ $totals['stories'] }}" type="primary" />
            </a>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <x-card header="Quick Note">
                <x-slot:body>
                    <form action="{{ route('manage.stories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('manage.partials.stories.note', ['story' => null])
                    </form>
                </x-slot:body>
            </x-card>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <x-card header="Recent Stories">
                <x-slot:body>
                    <ul class="list-group list-group-flush">
                        @forelse($recentStories as $story)
                            <li class="list-group-item">
                                <i class="me-2 fs-5 @if ($story->published_at) text-primary @else text-muted @endif fas fa-{{ $story->type->icon ?? 'file' }}"></i>
                                <a href="{{ route('manage.stories.edit', ['story' => $story]) }}" class="text-decoration-none me-4 fs-5">{{ $story->subject }}</a>
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
