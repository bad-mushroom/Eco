@props([
    'colspan' => 1,
])
<th class="col" colspan="{{ $colspan }}">{{ $slot }}</th>
