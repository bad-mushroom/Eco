@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Content <em>' . Str::plural(optional($selectedType)->label) . '</em>'])
<div class="container-sm">
    <div class="row px-4">
        <div class="col-12 text-end">
            <a href="{{ route('admin.content.create', ['type' => optional($selectedType)->slug ]) }}" class="btn btn-primary text-light">
                <i class="fas fa-plus me-2"></i>New Content
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-hover">
            <caption>Content</caption>
            <thead>
                <tr>
                    <th scope="col" colspan="2">Content</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Published</th>
                    <th scope="col">Author</th>
                    <th scope="col">Type</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="7"></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td class="text-center"><i class="fas fa-{{ $content->type->icon }} text-primary fs-3 mt-2"></i></td>
                        <td>
                            <h4>{{ $content->subject }}</h4>
                            <em class="text-muted">{{ Str::limit($content->body, 50, '...') }}</em>
                        </td>
                        <td>
                            <a href="{{ route('admin.content.index') }}">
                                <span class="badge bg-info">{{ $content->comments_count }}</span>
                            </a>
                        </td>
                        <td>
                            {{ $content->created_at->format('F jS Y') }} at {{ $content->created_at->format('h:i:s a') }}
                        </td>
                        <td>
                            {{ $content->author->name }}
                        </td>
                        <td>
                            <a href="{{ route('admin.content.index', ['type' => $content->type->slug]) }}">
                                <span class="badge bg-info">{{ $content->type->label }}</span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.content.edit', $content) }}" title="Preview" target="_blank"
                                class="btn btn-sm btn-secondary text-dark"><i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.content.edit', $content) }}" title="Edit"
                                class="btn btn-sm btn-secondary text-dark"><i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $contents->links() }}

@endsection
