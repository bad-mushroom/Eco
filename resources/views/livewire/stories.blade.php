<div class="container-fluid px-5">
    @include('manage.partials.alerts')
    <div class="row px-4 pb-3">
        <div class="col-12 text-end">
            <a href="{{ route('manage.stories.create', ['type' => optional($selectedType)->slug ]) }}" class="btn btn-primary text-light">
                <i class="fas fa-plus me-2"></i>New {{ optional($selectedType)->label }}
            </a>
        </div>
    </div>

    <x-table>
        <x-slot:head>
            <x-table.header colspan="2">Story</x-table.header>
            <x-table.header>Comments</x-table.header>
            <x-table.header>Published</x-table.header>
            <x-table.header>Author</x-table.header>
            <x-table.header>Type</x-table.header>
            <x-table.header>&nbsp;</x-table.header>
        </x-slot:head>

        <x-slot:body>
            @forelse ($stories as $story)
                <x-table.row>
                    <x-table.cell classes="text-center">
                        <x-icon icon="fas fa-{{ $story->type->icon ?? 'file' }}" color="primary" />
                    </x-table.cell>
                    <x-table.cell>
                        <h5>{{ $story->subject }}</h5>
                        <em class="text-muted">{{ Str::limit($story->body, 50, '...') }}</em>
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('manage.comments.index', $story) }}">
                            <span class="badge bg-info">{{ $story->comments_count }}</span>
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        {!! !empty($story->relative_published_at) ? $story->relative_published_at : '<em class="text-muted">Not Published</em>' !!}
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('manage.stories.index', ['author' => $story->author]) }}">
                            <img src="/avatar.jpg" class="rounded-circle border border-3" style="width: 35px;" alt="{{ $story->author->name }}"
                                title="{{ $story->author->name }}" />
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('manage.stories.index', ['type' => $story->type->slug]) }}">
                            <span class="badge bg-primary p-2">{{ $story->type->label }}</span>
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        @if ($story->published_at)
                        <a href="{{ route('stories.show', ['storyType' => $story->type, 'story' => $story]) }}" title="Preview" target="_blank"
                            class="btn btn-sm btn-secondary text-dark"><i class="fas fa-eye"></i>
                        </a>
                        @else
                        <button class="btn btn-sm btn-secondary text-dark" disabled><i class="fas fa-eye"></i></button>
                        @endif
                        <a href="{{ route('manage.stories.edit', $story) }}" title="Edit" class="btn btn-sm btn-secondary text-dark"><i
                                class="fas fa-edit"></i>
                        </a>
                    </x-table.cell>
                </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="7">No menus to show</x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot:body>

        <x-slot:foot>
            <x-table.row>
                <x-table.cell colspan="7">
                    {{ $stories->links() }}
                </x-table.cell>
            </x-table.row>
        </x-slot:foot>
    </x-table>
</div>
