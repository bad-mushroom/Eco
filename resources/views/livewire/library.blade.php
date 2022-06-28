<div class="container">
    @include('manage.partials.alerts')

    @include('manage.partials.modals.upload')

    <div class="row mb-3 me-2">
        <div class="col-12 text-end">
            <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#file-upload-1">
                <i class="fas fa-file-upload me-2"></i>Upload File
            </button>
        </div>
    </div>

    <div class="row">

        @foreach ($files as $file)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
               <div class="card m-1">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-file me-2"></i>{{ $file->label ?? $file->filename }}
                        </h5>
                       <span class="badge bg-primary">{{ $file->type }}</span>
                       <span class="badge bg-primary">{{ $file->readableFileSize }}</span>
                        <p class="card-text">{{ $file->description }}</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('files.download', $file) }}" class="card-link">Download</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $files->links() }}

    </div>
</div>
