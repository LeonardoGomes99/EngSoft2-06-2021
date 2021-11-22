@props(['background' => 'bg-blue-400', 'hover' => 'bg-blue-500', 'color' => 'white', 'rounded' => 'rounded', 'alignment' => ''])
<x-form.field :alignment=$alignment>
    <button type="submit"
    {{$attributes->merge([
        'class' =>
         'px-5 py-1.5 ' . $background . ' hover:' . $hover . ' focus:outline-none text-'.$color
        .' focus:ring flex text-black uppercase font-semibold text-s '.$rounded
        ])}}
    >
        {{ $slot }}
    </button>
</x-form.field>

