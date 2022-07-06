@extends('manage.layout')

@section('content')
    <div class="row">
        <div class="col-6">
            <x-header header="Stories" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-6">
            <x-partials.actions>
                <a href="{{ route('manage.stories.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Create Story
                </a>
            </x-partials.actions>
        </div>
    </div>

    <div class="row pt-3" data-masonry='{"percentPosition": true }'>

        @forelse ($stories as $story)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <x-dynamic-component :component="'partials.story_types.' . $story->type->slug" :story="$story">
                    {{ $story->summary }}
                </x-dynamic-component>
            </div>
        @empty
            <div class="col-12">Doesn't look like there are any stories to show.</div>
        @endforelse

        <div class="col-12">{{ $stories->links() }}</div>
    </div>
@endsection

@push('scripts')
    <script
        src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
        crossorigin="anonymous"
        async>
    </script>
@endpush
