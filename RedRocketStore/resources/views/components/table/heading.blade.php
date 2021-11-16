@props(['scope' => 'col', 'colspan' => '1', 'alignment' => 'text-left', 'sticky' => false, 'background' => ''])
@php
    $stickyness = 'sticky z-10 border-b top-0';
    if(!$sticky) $stickyness = '';
@endphp
<th
scope="{{$scope}}"
colspan="{{$colspan}}"
{{$attributes->merge(['class' => 'px-6 py-3 text-xs font-medium tracking-wider '.$alignment.' '.$background.' text-gray-500 uppercase '.$stickyness.' '])}}
{{$attributes}}
>

{{$slot}}

</th>
