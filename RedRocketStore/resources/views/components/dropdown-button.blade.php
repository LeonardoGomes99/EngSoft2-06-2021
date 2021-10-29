@props(['name' => ''])

<div class="relative" x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
    <button
        @click="isOpen = !isOpen"
        {{$attributes->merge([
            'class' => 'p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring flex'
            ])}}
    >

    @if($name != '')
        <span class="pr-3">{{$name}}</span>
    @endif

    {{$icon}}
    </button>

    {{$slot}}
</div>
