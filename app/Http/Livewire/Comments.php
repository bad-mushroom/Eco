<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Story;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $story;

    // -- Actions

    public function approve(Comment $comment)
    {
        $comment->is_approved = true;
        $comment->save();

        session()->flash('success', 'The comment has been approved.');
    }

    public function disapprove(Comment $comment)
    {
        $comment->is_approved = false;
        $comment->save();

        session()->flash('warning', 'The comment has been disapproved.');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();

        session()->flash('danger', 'The comment has been deleted.');
    }

    // -- Render

    public function render()
    {
        $comments = Comment::paginate();

        return view('livewire.comments')
            ->with('comments', $comments);
    }

    // -- Lifecycle

    public function mount(Story $story)
    {
        $this->story = $story;
    }
}
