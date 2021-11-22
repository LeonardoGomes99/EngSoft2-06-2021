@props(['link' => '#', 'color' => 'bg-gray-100', 'name', 'nolink' => false, 'alignment' => 'text-center'])
<li class="{{$alignment}}">
    @if(!$nolink) <a href="{{$link}}" {{$attributes(['class' => 'block px-2 py-1 transition rounded-md hover:'.$color])}}> {{$name}} </a>
    @else <span {{$attributes(['class' => 'block px-2 py-1 transition rounded-md hover:'.$color])}}> {{$name}} </span>
    @endif
</li>
