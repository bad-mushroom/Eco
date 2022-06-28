<x-modal id="file-upload-1">
    <x-slot:header>
        <x-modal.header title="File Upload" />
    </x-slot:header>
    <x-slot:body>
        <x-modal.body>
            <form action="{{ route('manage.files.store') }}" id="file-upload-1-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label"></label>
                    <input class="form-control" name="file" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="label" class="form-label">Label</label>
                    <input type="text" name="label" class="form-control" id="label" placeholder="Optional Label">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="2" placeholder="Optional description"></textarea>
                </div>
            </form>
        </x-modal.body>
    </x-slot:body>
    <x-slot:footer>
        <x-modal.footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" name="upload" onclick="event.preventDefault(); document.getElementById('file-upload-1-form').submit();" class="btn btn-primary">Upload</button>
        </x-modal.footer>
    </x-slot:footer>
</x-modal>
