@props(['heading' => '', 'manual' => false, 'border' => 'border-b'])

<section class="py-8 w-6/12 mx-auto">
    @if ($manual == false)
    <x-text-heading :heading='$heading' :border='$border' {{$attributes}}/>
    @else
        {{$heading}}
    @endif

    <div class="flex">
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
