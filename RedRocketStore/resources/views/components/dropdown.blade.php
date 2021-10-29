@props(['title', 'hasFooter' => false, 'alignment' => 'text-center'])

<div
    @click.away="isOpen = false"
    x-show.transition.opacity="isOpen"
    {{$attributes(['class' => 'absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max content-center'])}}
    >
    <div class="p-4 font-medium border-b {{$alignment}}">
        <span class="text-gray-800">{{$title}}</span>
    </div>

    <ul class="flex flex-col p-2 my-2 space-y-1">
        {{$slot}}
    </ul>

    @if ($hasFooter)
        <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
            {{$footer}}
        </div>
    @endif
</div>

