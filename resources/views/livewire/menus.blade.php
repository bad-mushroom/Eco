<div class="container-fluid px-5">
    @include('manage.partials.alerts')
    <div class="row px-4 pb-3">
        <div class="col-12 text-end">
            <a href="{{ route('manage.menus.create') }}" class="btn btn-primary text-light">
                <i class="fas fa-plus me-2"></i>New Menu
            </a>
        </div>
    </div>

    <x-table>
        <x-slot:head>
            <x-table.header>Menu</x-table.header>
            <x-table.header>Slug</x-table.header>
            <x-table.header>Total Items</x-table.header>
            <x-table.header></x-table.header>
        </x-slot:head>

        <x-slot:body>
            @forelse ($menus as $menu)
                <x-table.row>
                    <x-table.cell><x-icon icon="fas fa-bars" color="primary" />{{ $menu->label }}</x-table.cell>
                    <x-table.cell>{{ $menu->slug }}</x-table.cell>
                    <x-table.cell>{{ $menu->items_count }}</x-table.cell>
                    <x-table.cell></x-table.cell>
                </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="4">No menus to show</x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot:body>

        <x-slot:foot>
            <x-table.row>
                <x-table.cell colspan="4">
                    {{ $menus->links() }}
                </x-table.cell>
            </x-table.row>
        </x-slot:foot>
    </x-table>
</div>
