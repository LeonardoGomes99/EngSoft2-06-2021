@props(['name', 'title' => $name, 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $title }}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           type="{{ $type }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
