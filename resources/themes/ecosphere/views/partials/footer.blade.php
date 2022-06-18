
<footer class="py-5 bg-dark">
    <div class="container">
       @if ($menuSocial ?? false)
       <ul class="list-inline text-center">
            @foreach($menuSocial as $item)
            <li class="list-inline-item">
                <a href="{{ $item->url }}">
                    {{ $item->label }}
                    {{-- <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-{{ $item->slug }} fa-stack-1x fa-inverse"></i>
                    </span> --}}
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        <p class="m-0 text-center text-white">Copyright &copy; {{ $site_title }} 2022</p>
    </div>
</footer>
