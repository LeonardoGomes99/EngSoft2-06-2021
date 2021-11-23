@props(['placeholder' => 'pesquisar'])
<div class="flex border-grey-light border rounded-full">
    <input class="w-full rounded ml-1 pl-3 pr-5" type="text" placeholder="{{ $placeholder }}">
    <button class="bg-grey-lightest hover:bg-grey-lightest p-2">
        <div class="grid grid-cols-2 gap-2 border-l-1">

            <span class="w-auto flex justify-end items-center text-grey p-1 hover:text-grey-darkest rounded-full">
                Pesquisar
            </span>
            <x-default-svg width="32px" height="32px" :viewBox="'0 0 32 32'"
                style="stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0.392157%); fill-opacity:1;"
                :d="'M 19 3 C 13.488281 3 9 7.488281 9 13 C 9 15.394531 9.839844 17.589844 11.25 19.3125 L 3.28125 27.28125 L 4.71875 28.71875 L 12.6875 20.75 C 14.410156 22.160156 16.605469 23 19 23 C 24.511719 23 29 18.511719 29 13 C 29 7.488281 24.511719 3 19 3 Z M 19 5 C 23.429688 5 27 8.570312 27 13 C 27 17.429688 23.429688 21 19 21 C 14.570312 21 11 17.429688 11 13 C 11 8.570312 14.570312 5 19 5 Z M 19 5 '" />
        </div>
    </button>
</div>
