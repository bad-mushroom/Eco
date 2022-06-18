<nav class="sb-sidenav accordion text-light sb-sidebar-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="text-center my-3">
            <a href="{{ route('manage.profile') }}">
                <img src="data:image/png;base64,{{ auth()->user()->avatar }}" class="rounded-circle border border-3" style="width: 100px;" alt="" />
            </a>
            <p class="fw-bold fs-5 pt-2">{{ auth()->user()->name }}</p>
        </div>
        <hr>
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Favorites</div>
            <a class="nav-link" href="{{ route('manage.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Stories</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                By Types
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('manage.stories.index', ['type' => '*']) }}">View All Stories</a>
                    @foreach ($storyTypes as $type)
                        <a class="nav-link" href="{{ route('manage.stories.index', ['type' => $type->slug]) }}">{{ Str::plural($type->label) }}</a>
                    @endforeach
                </nav>
            </div>

            <a class="nav-link collapsed" href="{{ route('manage.stories.index', ['type' => 'page']) }}">
                <div class="sb-nav-link-icon"><i class="fas fa-file-lines"></i></div>
                Pages
            </a>

            <div class="sb-sidenav-menu-heading">Configuration</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                Settings
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseSettings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    @foreach ($settingTypes as $type)
                        <a class="nav-link" href="{{ route('manage.settings.index', ['type' => $type->slug]) }}">{{ $type->label }}</a>
                    @endforeach
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAppearance" aria-expanded="false" aria-controls="collapseAppearance">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Appearance
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAppearance" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('manage.menus.index') }}">Navigation Menus</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="sb-sidenav-footer">
        <div class="small">Last Seen:</div>
        {{ auth()->user()->last_login_at->format('m/d/Y h:i a') ?? 'Unknown' }}
    </div>
</nav>
