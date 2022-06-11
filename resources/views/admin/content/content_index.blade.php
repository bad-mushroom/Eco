@extends('admin.layout')

@section('content')

@include('admin.partials.container_header', ['page_title' => 'Content'])


<div class="row px-4">
    <div class="col-12 text-end"><a href="{{ route('admin.content.create') }}" class="btn btn-primary text-light"><i class="fas fa-plus me-2"></i>New Content</a></div>
</div>

<div class="card-body">
    <table class="table table-striped table-hover">
        <caption>Content</caption>
        <thead>
            <tr>
                <th scope="col">Content</th>
                <th scope="col">Comments</th>
                <th scope="col">Published</th>
                <th scope="col">Author</th>
                <th scope="col">Type</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="6"></th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>
                        <h4>{{ $page->subject }}</h4>
                        <em class="text-muted">{{ Str::limit($page->body, 50, '...') }}</em>
                    </td>
                    <td>
                       <a href="{{ route('admin.content.index') }}"><span class="badge bg-success">{{ $page->comments_count }}</span></a>
                    </td>
                    <td>
                        {{ $page->created_at }}
                    </td>
                    <td>
                        {{ $page->author->name }}
                    </td>
                    <td>
                        <a href="{{ route('admin.content.index', ['type' => $page->type->slug]) }}"><span class="badge bg-info">{{ $page->type->label }}</span></a>
                    </td>
                    <td>
                        <a href="{{ route('admin.content.edit', $page) }}" title="Preview" target="_blank" class="btn btn-sm btn-secondary text-light"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.content.edit', $page) }}" title="Edit" class="btn btn-sm btn-secondary text-light"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger text-light" title="Delete"><i class="fas fa-trash "></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- {{ $pages->links() }} --}}

@endsection
