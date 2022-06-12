<div>
    @include('admin.partials.container_header', [
        'page_title' => ($content ?? false) ? 'Edit <em>' . $content->subject . '</em>' : 'Create ' . Str::title($type),
        'back'       => 'admin.content.index',
    ])

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                @include('admin.partials.alerts')
                @include('admin.partials.content_types.' . $type, ['content' => $content])
            </div>
            <div class="col-lg-3">
                @include('admin.pages.content.content_sidebar')
            </div>
        </div>
    </div>
</div>
