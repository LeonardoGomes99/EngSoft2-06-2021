@props(['alignment' => ''])
<div {{ $attributes->merge(['class' => 'mt-6 ' . $alignment]) }}>
    {{ $slot }}
</div>
