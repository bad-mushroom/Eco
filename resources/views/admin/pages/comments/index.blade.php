@extends('admin.layout')

@section('content')
@include('admin.partials.container_header', [
    'page_title' => $story->subject . ' Comments',
    'back'       => 'admin.stories.index',
])

<div class="container-fluid px-4">

    @include('admin.partials.alerts')
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Comment</th>
                    <th scope="col">Author</th>
                    <th scope="col">Added</th>
                    <th scope="col">Session</th>
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
                        <td valign="middle">{{ $comment->author }}</td>
                        <td valign="middle">{{ $comment->relative_created_at }} </td>
                        <td valign="middle">{{ $comment->session }}</td>
                        <td valign="middle">
                            <form action="{{ route('admin.comments.destroy', ['story' => $story, 'comment' => $comment]) }}" method="POST">
                                @csrf
                                @method('delete')
                               <button title="Delete" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash"></i></button>
                            </form>
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
