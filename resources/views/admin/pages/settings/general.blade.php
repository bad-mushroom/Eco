@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => $settingType->label . ' Settings'])

<div class="container">
    <div class="card">
        <div class="card-body row">
            @foreach ($settings as $setting)
                <div class="col-12 mb-3">
                    <label for="{{ $setting->id }}" class="form-label">{{ $setting->label }}</label>
                    <input type="text" value="{{ $setting->value }}" class="form-control" id="{{ $setting->id }}" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">{{ $setting->description }}</div>
                </div>
            @endforeach
            <div class="col-12 text-end">
                <button class="btn btn-success text-light"><i class="fas fa-cloud me-2"></i>Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
