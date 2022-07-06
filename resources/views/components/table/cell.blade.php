@props([
    'colspan' => 1,
    'width' => ''
])

<td valign="middle" colspan="{{ $colspan }}" width="{{ $width }}">{{ $slot }}</td>
