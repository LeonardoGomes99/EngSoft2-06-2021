@props(['product'])

<tr class="transition-all hover:bg-gray-100 hover:shadow-lg py-5">
        <td class="border-l px-6 py-5 text-sm font-medium text-right whitespace-nowrap sticky border-t border-gray-200" style="height: 13vh;">
            <a href="{{ route('edit-product', $product->id) }}"
                class="btn px-5 py-1.5 focus:outline-nonefocus:ring flex inline-flex text-white uppercase font-semibold text-s rounded text-indigo-600 hover:text-indigo-900">Editar</a>
        </td>
        <td class="px-6 py-5 text-sm font-medium text-right whitespace-nowrap sticky h-4 border-t border-gray-200" style="height: 13vh;">
            <x-fake-button>Ver mais</x-fake-button>
        </td>

    </div>
</tr>

{{$slot}}
