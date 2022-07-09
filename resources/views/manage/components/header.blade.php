@props([
    'size' => 1,
    'header' => '',
    'classes' => ''
])

<h{{ $size }} class="{{ $classes }}">{{ $header }}</h{{ $size }}>
