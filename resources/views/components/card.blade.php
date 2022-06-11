<div class="card mb-3">
    <div class="card-header bg-primary text-light">{{ $header }}</div>
    <div class="card-body">{{ $body }}</div>
    @if ($footer)
        <div class="card-footer">{{ $footer }}</div>
    @endif
</div>
