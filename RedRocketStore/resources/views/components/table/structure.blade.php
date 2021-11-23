@props([
    'cols' => '8',
    'span' => '8',
    'scrollbar' => 'scrollbar-simple',
    'scrollbar_manager' => 'scroller hide-scrollbar',
    'structural_scrollbar' => 'scrollbar-simple',
    'width' => '97',
    'height' => '90',
    'gap' => '2'
])

<div class="my-2 overflow-x-hidden sm:-mx-6 lg:-mx-8">
    <div class="min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="border-b border-gray-200 rounded-md shadow-md">
            <div style="{{"width: ".$width."%;"}}">
                <div class="{{"overflow-y-auto ".$structural_scrollbar}}" style="{{"height: ".$height."%"}}">
                    <div class="overflow-x-auto">
                        <div class="{{"grid grid-cols-".$cols." gap-".$gap}}">
                                {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
