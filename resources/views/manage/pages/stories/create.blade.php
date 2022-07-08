@extends('manage.layout')

@section('content')

<div>
    <div class="row">
        <div class="col-8">
            <x-header header="Create Blog Post" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-4">
        </div>
    </div>

    @livewire('story-form-create')
</div>

@endsection
