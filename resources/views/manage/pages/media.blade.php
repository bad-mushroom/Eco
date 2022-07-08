@extends('manage.app')

@section('content')
<div>
    <div class="row">
        <div class="col-6">
            <x-header header="Media Library" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-6">
            <x-partials.actions>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mediaUpload">
                    <i class="bi bi-plus-circle me-2"></i>Upload File
                </button>
            </x-partials.actions>
        </div>
    </div>

    @livewire('media')

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
</script>
@endpush
