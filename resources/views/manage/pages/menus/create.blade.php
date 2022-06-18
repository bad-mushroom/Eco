@extends('manage.layout')

@section('content')
@include('manage.partials.container_header', ['page_title' => 'Create Menu'])
<div class="container">
    <form action="{{ route('manage.stories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="label" class="form-label required">Label</label>
                        <input type="text" name="label" class="form-control" id="label" value="" aria-describedby="labelHelp">
                        <div id="labelHelp" class="form-text">Name for this menu</div>
                    </div>
                </div>

                <label class="py-3">Menu Links</label>

                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="small">Type</label>
                            <select class="form-control">
                                <option value="page">Page</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="small">Label</label>
                            <input type="text" name="label" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="small">URL</label>
                            <input type="text" name="link" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="small">Icon</label>
                            <input type="text" name="icon" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <select class="form-control">
                                <option value="page">Page</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="label" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="link" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="icon" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="col-lg-12 text-end">
                    <button class="btn btn-primary text-light"><i class="fas fa-plus me-2"></i>Add Row</button>
                    <button class="btn btn-primary text-light"><i class="fas fa-cloud me-2"></i>Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

