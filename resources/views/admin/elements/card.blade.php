<div class="card mb-3">
    <div class="card-header {{ $card_background ?? 'bg-secondary' }} {{ $card_background_text ?? 'text-light' }}">
        @if ($card_icon)
            <i class="{{ $card_icon }} me-2"></i>
        @endif
        {{ $card_title ?? '' }}
    </div>
    <div class="card-body">
        <p class="card-text"></p>
    </div>
</div>
