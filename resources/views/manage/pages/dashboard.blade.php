@extends('app')

@section('content')

    <h1>Dashboard</h1>

    <div class="py-2">

        <div class="row mb-3">

            <!-- Content Column -->
            <div class="col-lg-6">
                <div class="row mb-3">
                    <!-- Metric -->
                    <div class=" col-md-6 mb-4">
                        <x-widgets.metric label="Website Visitors" value="?" color="primary" icon="bi bi-people" />
                    </div>

                    <!-- Metric -->
                    <div class="col-md-6 mb-4">
                        <x-widgets.metric label="Draft Stories" value="{{ $totals['stories_draft'] }}" color="warning" icon="bi bi-page" />
                    </div>

                    <!-- Metric -->
                    <div class="col-md-6 mb-4">
                        <x-widgets.metric label="Total Stories" value="{{ $totals['stories_total'] }}" color="success" icon="bi bi-page" />
                    </div>

                    <!-- Metric -->
                    <div class="col-md-6 mb-4">
                        <x-widgets.metric label="Pending Comments" value="{{ $totals['comments'] }}" color="info" icon="bi bi-chat" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="card shadow-sm mb-4 h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 fw-bold text-primary">Recent Stories</h6>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-flush">
                        @forelse($stories as $story)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <a href="{{ route('manage.stories.edit', $story->id) }}" class="fw-bold">{{ $story->subject }}</a>
                                    <p>{{ $story->relative_created_at }}</p>
                                </div>
                                <span class="badge bg-primary rounded-pill p-2 px-3">{{ $story->type->label }}</span>
                            </li>
                        @empty
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">No stories to show</div>
                                    Why not <a href="{{ route('manage.stories.create') }}">create</a> one now?
                                </div>
                            </li>
                        @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
