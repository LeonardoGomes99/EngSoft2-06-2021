@props(['stroke_width' => '2', 'd'])
<svg
{{$attributes->merge(['class' => 'text-gray-500'])}}
xmlns="http://www.w3.org/2000/svg"
fill="none"
{{$attributes(['viewBox' => '0 0 24 24'])}}
stroke="currentColor"
>
    <path
    {{$attributes(['style' => ''])}}
    stroke-linecap="round"
    stroke-linejoin="round"
    stroke-width="{{$stroke_width}}"
    d="{{$d}}"
    />
</svg>
