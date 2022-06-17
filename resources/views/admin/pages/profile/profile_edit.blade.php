@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Profile'])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.partials.alerts')
            <div class="card">
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body row">
                        <div class="col-md-2">
                            <div class="text-center my-3">
                                <img src="data:image/png;base64,{{ auth()->user()->avatar }}" class="rounded-circle border border-3 border-secondary" style="width: 100px;" alt="" />
                                <p class="fw-bold fs-5 pt-2">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="name" class="form-label required">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" aria-describedby="nameHelp">
                                <div id="nameHelp" class="form-text">Your name as you want it to appear to visitors.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Your email addressed will not be visible.</div>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label required">Avatar</label>
                                <input type="file" class="form-control" name="avatar" id="avatar" aria-describedby="avatarHelp">
                                <div id="avatarHelp" class="form-text">Profile image.</div>
                            </div>
                            <div class="col-lg-12 text-end">
                                <button type="submit" class="btn btn-success text-light"><i class="fas fa-cloud me-2"></i>Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
