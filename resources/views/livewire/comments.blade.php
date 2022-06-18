<div class="container-fluid px-5">
    @include('manage.partials.alerts')
    <x-table>
    <x-slot:head>
        <x-table.header colspan="2">Comment</x-table.header>
        <x-table.header>Author</x-table.header>
        <x-table.header>Commented</x-table.header>
        <x-table.header>Story</x-table.header>
        <x-table.header>Session</x-table.header>
        <x-table.header>&nbsp;</x-table.header>
    </x-slot:head>

    <x-slot:body>
        @forelse ($comments as $comment)
            <x-table.row>
                <x-table.cell>
                    <x-icon icon="fas fa-comments" size="4" color="{{ ($comment->is_approved) ? 'primary' : 'secondary' }}" />
                </x-table.cell>
                <x-table.cell><em class="text-muted">{{ Str::limit($comment->body, 50, '...') }}</em></x-table.cell>
                <x-table.cell>{{ $comment->author }}</x-table.cell>
                <x-table.cell>{{ $comment->relative_created_at }}</x-table.cell>
                <x-table.cell>{{ $comment->commentable->subject }}</x-table.cell>
                <x-table.cell>{{ Str::limit($comment->session, 15) }}</x-table.cell>
                <x-table.cell>
                    <button wire:click="approve({{ $comment }})" title="Approve" class="btn btn-sm btn-primary text-light" @if ($comment->is_approved) disabled @endif><i class="fas fa-check"></i></button>
                    <button wire:click="disapprove({{ $comment }})" title="Disapprove" class="btn btn-sm btn-warning text-light"@if (!$comment->is_approved) disabled @endif><i class="fas fa-x"></i></button>
                    <button wire:click="delete({{ $comment }})" title="Delete" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash"></i></button>
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
                {{ $comments->links() }}
            </x-table.cell>
        </x-table.row>
    </x-slot:foot>
</x-table>
</div>
