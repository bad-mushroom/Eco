@extends('manage.layout')

@section('content')
    <div class="row">
        <div class="col-6">
            <x-header header="Comments" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-6">
        </div>
    </div>

    <div class="row pt-3" data-masonry='{"percentPosition": true }'>
        @forelse ($comments as $comment)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5>re: {{ $comment->commentable->subject }}</h5>
                        <div>from <a href="#">{{ $comment->author }}</a></div>
                        <div class="py-2">{{ $comment->body }}</div>
                        <span class="text-dark badge bg-info"></span>
                    </div>
                    <div class="card-footer">
                        <a href="" title="Delete" class="me-2"><i class="bi bi-trash"></i></a> | <a href="" class="ms-2" title="Spam"><i class="bi bi-flag"></i></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">Doesn't look like there are any comments to show.</div>
        @endforelse

        <div class="col-12">{{ $comments->links() }}</div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
    integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
</script>
@endpush
