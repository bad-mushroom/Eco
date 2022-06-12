<div>
    @include('admin.partials.container_header', [
        'page_title' => 'Create ' . Str::title($type),
        'back'       => 'admin.content.index',
    ])
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                @include('admin.partials.content_types.' . $type)
            </div>
            <div class="col-lg-3">
                @include('admin.pages.content.content_sidebar')
            </div>
        </div>
    </div>
</div>
