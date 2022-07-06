@extends('manage.layout')

@section('content')

<div>
    <div class="row">
        <div class="col-6">
            <x-header header="Create Blog Post" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-6">
        </div>
    </div>

    @livewire('story-form')
</div>

@endsection
