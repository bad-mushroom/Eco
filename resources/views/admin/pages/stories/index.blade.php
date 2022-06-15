@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', ['page_title' => 'Story <em>' . Str::plural(optional($selectedType)->label) . '</em>'])
<div class="container-sm">
    <div class="row px-4">
        <div class="col-12 text-end">
            <a href="{{ route('admin.stories.create', ['type' => optional($selectedType)->slug ]) }}" class="btn btn-primary text-light">
                <i class="fas fa-plus me-2"></i>New Story
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Story</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Published</th>
                    <th scope="col">Author</th>
                    <th scope="col">Type</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="7">{{ $stories->links() }}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($stories as $story)
                    <tr>
                        <td valign="middle" class="text-center"><i class="fas fa-{{ $story->type->icon ?? 'file' }} text-primary fs-3 mt-2"></i></td>
                        <td valign="middle">
                            <h4>{{ $story->subject }}</h4>
                            <em class="text-muted">{{ Str::limit($story->body, 50, '...') }}</em>
                        </td>
                        <td valign="middle">
                            <a href="{{ route('admin.comments.index', $story) }}">
                                <span class="badge bg-info">{{ $story->comments_count }}</span>
                            </a>
                        </td>
                        <td valign="middle">
                            {!! !empty($story->relative_published_at) ? $story->relative_published_at : '<em class="text-muted">Not Published</em>' !!}
                        </td>
                        <td valign="middle">
                            <img src="/avatar.jpg" class="rounded-circle border border-3" style="width: 35px;" alt="{{ $story->author->name }}" title="{{ $story->author->name }}" />
                        </td>
                        <td valign="middle">
                            <a href="{{ route('admin.stories.index', ['type' => $story->type->slug]) }}">
                                <span class="badge bg-primary p-2"><i class="fas fa-{{ $story->type->icon ?? 'message' }} me-2"></i>{{ $story->type->label }}</span>
                            </a>
                        </td>
                        <td valign="middle">
                            <a href="{{ route('admin.stories.edit', $story) }}" title="Preview" target="_blank"
                                class="btn btn-sm btn-secondary text-dark"><i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.stories.edit', $story) }}" title="Edit"
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
