<div class="d-flex mb-5">
    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"alt="..." /></div>
    <div class="ms-3">
        <div class="text-muted">{{ $comment->relative_created_at }}</div>
        <div><span class="text-primary">{{ $comment->author }}</span> says:</div>

       <div class="py-2">{{ $comment->body }}</div>
    </div>
</div>
