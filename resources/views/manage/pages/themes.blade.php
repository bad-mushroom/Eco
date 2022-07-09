@extends('manage.layout')

@section('content')
<div class="row">
    <div class="col-6">
        <x-header header="Themes" />
        <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
    </div>
    <div class="col-6">
    </div>
</div>

@include('manage.partials.alerts')

    <div class="row pt-3" data-masonry='{"percentPosition": true }'>
        @forelse ($themes as $theme)
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="py-2">{{ $theme->description }}</div>
                </div>
                <div class="card-footer bg-white">
                   <span class="fw-bold">{{ $theme->name }}</span>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12">Doesn't look like there are any themes to show.</div>
        @endforelse
    </div>
@endsection
