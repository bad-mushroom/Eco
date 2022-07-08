<div class="container">
    <form action="" method="POST">
        @csrf
        @method('PUT')

        <x-header header="Site Appearance" size="4" classes="pb-3" />

        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" class="img-fluid border border-light p-2 m-3"/>
                </div>
                <div class="mb-3">
                    <label for="site_title" class="form-label">Logo</label>
                    <input type="file" class="form-control" name="logo">
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="site_title" class="form-label">Site Title</label>
                    <input type="text" class="form-control" name="site_title" value="{{ $settings['site_title'] }}" aria-labelledby="siteTitleHelp">
                    <span id="siteTitleHelp" class="form-text">Name for your website</span>
                </div>
                <div class="mb-3">
                    <label for="site_title" class="form-label">Site Headline</label>
                    <input type="text" class="form-control" name="site_headline" value="{{ $settings['site_headline'] }}" aria-labelledby="siteHeadlineHelp">
                    <span id="siteHeadlineHelp" class="form-text">A sentance or two tagline or description</span>
                </div>
                <div class="mb-3">
                    <label for="site_title" class="form-label">Site Description</label>
                    <textarea class="form-control" name="site_description" value="{{ $settings['site_description'] }}" aria-labelledby="siteDescriptionHelp"></textarea>
                    <span id="siteDescriptionHelp" class="form-text">Website description</span>
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
