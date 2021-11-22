@props(['bg' => 'bg-blue-400 hover:bg-blue-500', 'href' => ''])
<a href={{$href}} {{$attributes->merge(['class' => 'btn px-5 py-1.5 '.$bg.' focus:outline-nonefocus:ring flex inline-flex text-white uppercase font-semibold text-s rounded'])}}>
    {{$slot}}
</a>
