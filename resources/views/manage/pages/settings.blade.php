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

    @include('manage.partials.alerts')

    <section id="settings-{{ $settingType->slug }}">
        @includeIf('manage.pages.settings.' . $settingType->slug)
    </section>
@endsection
