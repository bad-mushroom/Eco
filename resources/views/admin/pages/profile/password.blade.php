@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Change Password'])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.partials.alerts')
            <div class="card">
                <form action="{{ route('admin.password.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="current_password" class="form-label required">Current Password</label>
                                <input type="password" class="form-control" name="current_password" id="current_password" aria-describedby="passwordHelp">
                                <div id="nameHelp" class="form-text @error('current_password') text-danger @enderror">Enter your current password.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label required">New Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="new_passwordHelp">
                                <div id="new_passwordHelp" class="form-text @error('password') text-danger @enderror">Your new password must be atleast 8 characters.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label required">New Password (Confirm)</label>
                                <input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation"
                                    aria-describedby="password_confirmationHelp">
                                <div id="password_confirmationHelp" class="form-text @error('password_confirmation') text-danger @enderror">Enter your new password again.</div>
                            </div>
                            <div class="col-lg-12 text-end">
                                <button type="submit" class="btn btn-success text-light"><i
                                        class="fas fa-cloud me-2"></i>Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
