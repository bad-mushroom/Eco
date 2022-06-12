<nav class="sb-sidenav accordion text-light sb-sidebar-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Favorites</div>
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Content</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Content Types
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.content.index', ['type' => '*']) }}">View All Content</a>
                    @foreach ($contentTypes as $type)
                        <a class="nav-link" href="{{ route('admin.content.index', ['type' => $type->slug]) }}">{{ $type->label }}</a>
                    @endforeach
                </nav>
            </div>

            <a class="nav-link collapsed" href="{{ route('admin.content.index', ['type' => 'page']) }}">
                <div class="sb-nav-link-icon"><i class="fas fa-file-lines"></i></div>
                Pages
            </a>

            <a class="nav-link collapsed" href="{{ route('admin.categories.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                Categories
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
                        <a class="nav-link" href="{{ route('admin.settings.index', ['type' => $type->slug]) }}">{{ $type->label }}</a>
                    @endforeach
                </nav>
            </div>
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Appearance
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ auth()->user()->name }}
    </div>
</nav>
