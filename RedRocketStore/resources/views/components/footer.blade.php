@props(['message' => ''])

<footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">

    <div class="relative flex text-sm">
        <span> RedRocketStore - Controle de Estoque</span>
    </div>

    @if($message != '')
        <div class="relative flex space-x-3">
            <span> {{$message}} </span>
        </div>
    @endif
    <x-flash/>
</footer>
