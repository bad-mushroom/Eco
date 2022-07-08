@extends('manage.app')

@section('content')
<div class="row">
    <div class="col-6">
        <x-header header="Plugins" />
        <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
    </div>
    <div class="col-6">
    </div>
</div>

@include('manage.partials.alerts')

<div class="row pt-3" data-masonry='{"percentPosition": true }'>
    @forelse ($plugins as $plugin)
    <div class="col-md-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="py-2">{{ $plugin->description }}</div>
            </div>
            <div class="card-footer bg-white">
                <span class="fw-bold">{{ $plugin->name }}</span>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">Doesn't look like there are any plugins to show.</div>
    @endforelse
</div>
@endsection
