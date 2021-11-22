    @props(['override' => false, 'heading' => 1, 'alignment' => 'place-items-left', 'border' => 'border-b', 'columns' => '1', 'size' => 'lg', 'font' => 'font-bold'])

    @php
        if ($override) {
            $values = $attributes(['class']);
        } else {
            $values = $attributes->merge(['class' => 'grid grid-cols-' . $columns . ' text-' . $size . ' ' . $font . ' mb-8 pb-2 ' . $border . ' ' . $alignment]);
        }
        echo "<h$heading $values>";
    @endphp
    {{ $slot }}
    @php
        echo "</h$heading>";
    @endphp
