@extends('manage.layout')

@section('content')

<div>
    <div class="row">
        <div class="col-8">
            <x-header :header="'Edit ' . $story->type->label . ': ' . $story->subject" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-4">
        </div>
    </div>

    @livewire('story-form-edit', ['story' => $story])

</div>
@endsection
