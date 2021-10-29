    @props(['heading', 'alignment' => 'place-items-left', 'border' => 'border-b', 'columns' => '1', 'size' => 'lg'])

    <h1 {{$attributes->merge(['class' => 'grid grid-cols-'.$columns.' text-'.$size.' font-bold mb-8 pb-2 '.$border.' '.$alignment])}}>
        {{ $heading }}
    </h1>

