<div class="container-header bg-warning text-light mb-5">
    <h2 class="pt-1 ms-2">
      @if ($back ?? null)
          <a href="{{ route($back) }}" class="text-light"><i class="fa-solid fa-circle-left me-2 fs-3"></i></a>
      @endif
      {!! $page_title !!}
    </h2>
</div>
