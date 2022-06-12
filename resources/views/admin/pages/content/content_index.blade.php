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
                    <th colspan="7">{{ $contents->links() }}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td valign="middle" class="text-center"><i class="fas fa-{{ $content->type->icon ?? 'file' }} text-primary fs-3 mt-2"></i></td>
                        <td valign="middle">
                            <h4>{{ $content->subject }}</h4>
                            <em class="text-muted">{{ Str::limit($content->body, 50, '...') }}</em>
                        </td>
                        <td valign="middle">
                            <a href="{{ route('admin.content.index') }}">
                                <span class="badge bg-info">{{ $content->comments_count }}</span>
                            </a>
                        </td>
                        <td valign="middle">
                            {!! !empty($content->relative_published_at) ? $content->relative_published_at : '<em class="text-muted">Not Published</em>' !!}
                        </td>
                        <td valign="middle">
                            <img src="/avatar.jpg" class="rounded-circle border border-3" style="width: 35px;" alt="{{ $content->author->name }}" title="{{ $content->author->name }}" />
                        </td>
                        <td valign="middle">
                            <a href="{{ route('admin.content.index', ['type' => $content->type->slug]) }}">
                                <span class="badge bg-primary p-2"><i class="fas fa-{{ $content->type->icon ?? 'message' }} me-2"></i>{{ $content->type->label }}</span>
                            </a>
                        </td>
                        <td valign="middle">
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

@endsection
