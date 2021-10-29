@props(['link' => ''])

<button
    {{ $attributes->merge([
    'class' => 'p-2 bg-gray-100 rounded-full focus:outline-none focus:ring hover:bg-gray-200 flex md:hidden',
    ]) }}>

    {{$icon}}

    @if ($link != '')
        <a href="{{ $link }}"> {{ $slot }} </a>
    @else
        {{ $slot }}
    @endif
</button>
