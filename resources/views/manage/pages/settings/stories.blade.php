<div class="container">
    <form action="" method="POST">
        @csrf
        @method('PUT')

        <x-header header="Stories and Content" size="4" classes="pb-3" />

        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="posts_per_page" class="form-label">Stories per Page</label>
                    <input type="text" class="form-control" name="posts_per_page" value="{{ $settings['posts_per_page'] }}"
                        aria-labelledby="postsPerPageHelp">
                    <span id="postsPerPageHelp" class="form-text">Total number of stories to show on each page</span>
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
