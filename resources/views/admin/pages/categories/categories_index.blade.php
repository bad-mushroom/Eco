@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Categories'])

<div class="container-sm">
    <div class="row px-4">
        <div class="col-12 text-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary text-light">
                <i class="fas fa-plus me-2"></i>New Category
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-hover">
            <caption>Categories</caption>
            <thead>
                <tr>
                    <th scope="col" colspan="2">Category</th>
                    <th scope="col">Contents</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="7"></th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="text-center"><i class="fas fa-{{ $category->icon }} text-primary fs-3 mt-2"></i></td>
                        <td>
                            <h4>{{ $category->label }}</h4>
                        </td>
                        <td>
                            <a href="{{ route('admin.contents.index') }}">
                                <span class="badge bg-info">{{ $category->contents_count }}</span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" title="Edit"
                                class="btn btn-sm btn-secondary text-dark"><i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            There hasn't been any categories created yet.
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{ $categories->links() }}

@endsection
