<div class="d-flex mb-5 p-comment h-cite">
    <div class="flex-shrink-0">
        <img class="rounded-circle u-photo" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
    </div>
    <div class="ms-3">
        <div class="text-muted dt-published">{{ $comment->relative_created_at }}</div>
        <div>
            <span class="text-primary">@author($comment)</span> says:
        </div>
        <div class="py-2 p-comment">{{ $comment->body }}</div>
    </div>
</div>
