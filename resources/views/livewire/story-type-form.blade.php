<div>
    @include('manage.partials.container_header', [
        'page_title' => ($story ?? false) ? 'Edit <em>' . $story->subject . '</em>' : 'Create ' . Str::title($type),
        'back'       => 'manage.stories.index',
    ])

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                @include('manage.partials.alerts')
                @include('manage.partials.stories.' . $type, ['content' => $story])
            </div>
            <div class="col-lg-3">
                @include('manage.pages.stories.sidebar')
            </div>
        </div>
    </div>
</div>
