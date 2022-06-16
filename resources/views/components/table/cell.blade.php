@props([
    'colspan' => 1,
])

<td valign="middle" colspan="{{ $colspan }}">{{ $slot }}</td>
