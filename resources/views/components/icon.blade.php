@props([
    'icon'    => 'fas fa-circle-info',
    'color'   => 'primary',
    'size'    => '3',
    'classes' => '',
])
<i class="text-{{ $color }} {{ $icon }} fs-{{ $size }} {{ $classes }} me-2"></i>
