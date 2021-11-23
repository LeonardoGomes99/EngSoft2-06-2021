@props(['link' => '', 'hasIcon' => true])

<button
    {{ $attributes->merge([
    'class' => 'p-2 bg-gray-100 rounded-full focus:outline-none focus:ring hover:bg-gray-200 flex',
    ]) }}>

    @if($hasIcon)
        {{$icon}}
    @endif

    @if ($link != '')
        <a href="{{ $link }}"> {{ $slot }} </a>
    @else
        {{ $slot }}
    @endif
</button>
