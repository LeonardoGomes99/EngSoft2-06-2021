@props([
    'span' => '8',
    'scrollbar' => 'scrollbar-simple',
    'scrollbar_manager' => 'scroller hide-scrollbar'
])
<div {{$attributes->merge(['class' => 'col-span-'.$span.' overflow-auto '.$scrollbar.' '.$scrollbar_manager])}}
    {{$attributes}}>
    {{$slot}}
</div>
