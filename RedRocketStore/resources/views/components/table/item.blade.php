@props(['product'])

<tr class="transition-all hover:bg-gray-100 hover:shadow-lg border-t border-gray-200">

    <td class="px-6 py-5 whitespace-nowrap" style="height: 13vh;">

        <div class="flex items-center">

            <!-- Random colors as a temporary placeholder !-->
            <div class="flex-shrink-0 w-10 h-10" style="background-color: {{ sprintf('#%06X', mt_rand(0, 0xffffff)) }}">

            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
            </div>
        </div>
    </td>

    <td class="px-6 py-5 whitespace-nowrap" style="height: 13vh;">
        <div class="text-sm text-gray-900">{{ strtok($product->description, '.') }}</div>
    </td>

    <td class="px-6 py-5 whitespace-nowrap" style="height: 13vh;">
        <div class="text-sm text-gray-900">{{ $product->model }}</div>
    </td>

    <td class="px-12 py-5 whitespace-nowrap" style="height: 13vh;">
        <span
            class="inline-flex px-2 text-xs font-semibold self-center leading-5 text-green-800 bg-green-100 rounded-full">
            {{ $product->quantity }}
        </span>
    </td>
    <td class="px-6 py-5 text-sm text-gray-500 whitespace-nowrap" style="height: 13vh;">
        {{ $product->created_at }}
    </td>
    <td class="px-6 py-5 text-sm text-gray-500 whitespace-nowrap" style="height: 13vh;">
        {{ $product->color }}
    </td>

</tr>

{{$slot}}