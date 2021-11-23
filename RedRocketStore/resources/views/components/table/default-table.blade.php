@props([
    'products',
    'override_headings' => false,
    'override_body' => false,
    'override_headings2' => false,
    'override_body2' => false,
    'heading-position' => 'sticky'
    ])
@php
    function getLinesValues($content){
            $values = $content->__toString();
            $separator = "\r\n";
            $lines = array();
            $line = strtok($values, $separator);

            // First value
            array_push($lines, ltrim($line));
            while ($line !== false) {
                $line = strtok( $separator );
                if($line != '') array_push($lines, ltrim($line));
            };
        return $lines;
    }
@endphp

<x-table.structure :cols="8" :gap="2">
    <x-table.section id="table_content" :span="6">
        <div id="table_content" onscroll="OnScroll(this, 'table_links')">
            <x-table.table id="content_table">
                <x-slot name="heading">
                    @if ($override_headings)
                        {{$headings}}
                    @else
                        @foreach (getLinesValues($headings) as $line)
                          <x-table.heading :sticky=true :background="'bg-gray-50'">{{$line}}</x-table.heading>
                        @endforeach
                    @endif
                </x-slot>

                <x-slot name="body">
                    @if ($override_body)
                        {{$body}}
                    @else
                        @foreach ($products as $product)
                            <x-table.item :product="$product">
                                <td colspan="6" class="whitespace-nowrap">
                                    <p style="height: 26vh;">Conteúdo</p>
                                </td>
                            </x-table.item>
                        @endforeach
                    @endif
                </x-slot>
            </x-table.table>
        </div>
    </x-table.section>

    <x-table.section id="table_links" :span="2" :scrollbar_manager="''" :scrollbar="''">
        <div class="scrollbar-simple overflow-y-auto" style="height: 90vh;" id="table_links"
        onscroll="OnScroll(this, 'table_content')">
            <x-table.table id="links_table">
                <x-slot name="heading">
                    <div class="">
                        @if ($override_headings2)
                            {{$headings2}}
                        @else
                            @foreach (getLinesValues($headings2) as $line)

                                <x-table.heading
                                :scope="'colgroup'"
                                :colspan="'2'"
                                :alignment="'text-center'"
                                :sticky=true
                                :background="'bg-gray-50'"
                                >
                                {{$line}}
                            </x-table.heading>
                            @endforeach
                        @endif
                </x-slot>

                <x-slot name="body">
                    @if ($override_body2)
                        {{$body2}}
                    @else
                        @foreach ($products as $product)
                            <x-table.link :product="$product">
                                <td colspan="2" class="whitespace-nowrap border-l grid grid-cols-2 gap-2 place-items-center">
                                    <p class="col-span-2" style="height: 26vh;">Links extras</p>
                                </td>
                            </x-table.link>
                        @endforeach
                    @endif
                </x-slot>
            </x-table.table>
        </div>
    </x-table.section>
</x-table.structure>

    <div class="border-t"></div>
    @if ($products->count())
        <div class="p-4 pt-8 pl-12 pr-12">
            {{ $products->links() }}
        </div>
    @endif
</div>
