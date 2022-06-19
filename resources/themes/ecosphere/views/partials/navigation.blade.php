<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ $site_title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedStory"
            aria-controls="navbarSupportedStory" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedStory">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('manage.index') }}">Manage Site</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    @foreach ($pages as $page)
                        <li class="nav-item"><a class="nav-link" href="{{ route('pages.show', $page) }}">{{ $page->subject }}</a></li>
                    @endforeach
                </ul>
            </div>
    </div>
</nav>
