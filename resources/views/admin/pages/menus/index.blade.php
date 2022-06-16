@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Navigation Menus'])

<div class="container-sm">
    <div class="row px-4">
        <div class="col-12 text-end">
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary text-light">
                <i class="fas fa-plus me-2"></i>New Menu
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-hover">
            <caption>Navigation Menus</caption>
            <thead>
                <tr>
                    <th scope="col" colspan="2">Menu</th>
                    <th scope="col">Items</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="7"></th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td class="text-center"><i class="fas fa-{{ $menu->icon }} text-primary fs-3 mt-2"></i></td>
                        <td>
                            <h4>{{ $menu->label }}</h4>
                        </td>
                        <td>
                            <a href="{{ route('admin.menus.index') }}">
                                <span class="badge bg-info">{{ $menu->items_count }}</span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.menus.edit', $menu) }}" title="Edit"
                                class="btn btn-sm btn-secondary text-dark"><i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            There hasn't been any menus created yet.
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{ $menus->links() }}

@endsection
