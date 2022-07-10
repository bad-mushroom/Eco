@extends('manage.layout')

@section('content')
<div class="row">
    <div class="col-6">
        <x-header header="My Profile" />
        <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
    </div>
    <div class="col-6">
    </div>
</div>

@include('manage.partials.alerts')

<section id="section-profile">
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    @if (auth()->user()->avatar)
                        <img src="data:image/png;base64,{{ auth()->user()->avatar }}" width="150" class="img-fluid border rounded-circle border-primary m-3" />
                    @else
                        <img src="https://via.placeholder.com/150" class="iborder rounded-circle border-primary m-3" />
                    @endif
                </div>
                <div class="mb-3">
                    <label for="site_title" class="form-label">Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $profile->name }}" aria-labelledby="nameHelp">
                    <span id="nameHelp" class="form-text">Hey! What's your name?</span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $profile->email }}" aria-labelledby="emailHelp">
                    <span id="emailHelp" class="form-text">Email. Will be kept private by default.</span>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" name="bio" value="{{ $profile->bio }}" aria-labelledby="bioHelp"></textarea>
                    <span id="bioHelp" class="form-text">A short introduction</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <button class="btn btn-success text-light"><i class="bi bi-cloud-fill me-2"></i>Save Changes</button>
            </div>
        </div>
</div>
</div>
</section>
@endsection
