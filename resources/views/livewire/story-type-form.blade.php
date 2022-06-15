<div>
    @include('admin.partials.container_header', [
        'page_title' => ($story ?? false) ? 'Edit <em>' . $story->subject . '</em>' : 'Create ' . Str::title($type),
        'back'       => 'admin.stories.index',
    ])

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                @include('admin.partials.alerts')
                @include('admin.partials.stories.' . $type, ['content' => $story])
            </div>
            <div class="col-lg-3">
                @include('admin.pages.stories.sidebar')
            </div>
        </div>
    </div>
</div>
