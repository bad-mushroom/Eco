@extends('manage.layout')

@section('content')
    <div class="row">
        <div class="col-6">
            <x-header header="Settings" />
            <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
        </div>
        <div class="col-6">
        </div>
    </div>

    <section id="settings-{{ $settingType }}">
        <x-header header="{{ $settingType->label }}" size="5" classes="pb-3" />

        
    </section>
@endsection
