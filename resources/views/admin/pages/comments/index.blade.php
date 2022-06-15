@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', [
    'page_title' => $story->subject . ' Comments',
    'back' => 'admin.stories.index',
])

<div class="container-fluid px-4">

    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Comment</th>
                    <th scope="col">Author</th>
                    <th scope="col">Published</th>
                    <th scope="col">Status</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="7">{{ $comments->links() }}</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($comments as $comment)
                    <tr>
                        <td valign="middle" class="text-center"><i class="fas fa-comments text-primary fs-3 mt-2"></i></td>
                        <td valign="middle">
                            <em class="text-muted">{{ Str::limit($comment->body, 50, '...') }}</em>
                        </td>
                        <td valign="middle">
                            <img src="/avatar.jpg" class="rounded-circle border border-3" style="width: 35px;"
                                alt="{{ $comment->author ?? $comment->username ?? 'anonymous' }}" title="{{ $comment->author ?? $comment->username ?? 'anonymous' }}" />
                        </td>
                        <td valign="middle">
                            {!! !empty($comment->relative_created_at) ? $story->relative_created_at : '<em
                                class="text-muted">Not Published</em>' !!}
                        </td>

                        <td valign="middle">

                        </td>
                        <td valign="middle">
                            <a href="{{ route('admin.comments.edit', $comment) }}" title="Edit" class="btn btn-sm btn-secondary text-dark">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No comments</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
