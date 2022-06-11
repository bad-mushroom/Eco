<h1 class="mt-4">
    @if ($back ?? null)
        <a href="{{ route($back) }}"><i class="fa-solid fa-circle-left me-2 fs-3 mb-1"></i></a>
    @endif
    {{ $page_title }}
</h1>
