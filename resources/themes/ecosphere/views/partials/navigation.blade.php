<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ $site_title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedStory"
            aria-controls="navbarSupportedStory" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if ($menuMain ?? false)
            <div class="collapse navbar-collapse" id="navbarSupportedStory">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @foreach ($menuMain as $item)
                    <li class="nav-item"><a class="nav-link" href="#">{{ $item->label }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</nav>
