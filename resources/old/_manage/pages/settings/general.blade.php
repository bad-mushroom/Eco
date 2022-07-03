@extends('manage.layout')

@section('content')
@include('manage.partials.container_header', ['page_title' => $settingType->label . ' Settings'])

<div class="container">
    @include('manage.partials.alerts')
    <div class="card">
        <div class="card-body row">
            <form action="{{ route('manage.settings.update') }}" method="post">
                @csrf
                @method('put')
                @foreach ($settings as $setting)
                    <div class="col-12 mb-3">
                        <label for="{{ $setting->id }}" class="form-label">{{ $setting->label }}</label>
                        <input type="text" value="{{ $setting->value }}" name="{{ $setting->slug }}" class="form-control" id="{{ $setting->id }}" aria-describedby="{{ $setting->slug }}Help">
                        <div id="{{ $setting->slug }}Help" class="form-text">{{ $setting->description }}</div>
                    </div>
                @endforeach
                <div class="col-12 text-end">
                    <button class="btn btn-success text-light"><i class="fas fa-cloud me-2"></i>Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
