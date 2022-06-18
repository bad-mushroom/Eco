@props([
    'icon'   => 'fas fa-circle-info',
    'color'  => 'primary',
    'size'   => '3'
])
<i class="text-{{ $color }} {{ $icon }} fs-{{ $size }} me-2"></i>
