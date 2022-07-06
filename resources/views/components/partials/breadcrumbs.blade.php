<ol class="breadcrumb m-0">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Home</a></li>
    @foreach ($crumbs as $crumb)
        <li class="breadcrumb-item"><a href="{{ route($crumb['route']) }}">{{ $crumb['label'] }}</a></li>
    @endforeach
    <li class="breadcrumb-item active">{{ $current }}</li>
</ol>

