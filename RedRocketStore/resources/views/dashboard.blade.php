<x-header />
<style>
    .scroller {
        flex: 1;
        overflow-x: scroll;
        overflow-y: show;
        height: 90vh;
    }

    .hide-scrollbar::-webkit-scrollbar {
        width: 0 !important;
    }


    .scrollbar-simple::-webkit-scrollbar {
        width: 1.1vw;
        height: 2.5vh;
    }

    .scrollbar-simple::-webkit-scrollbar-track {
        border-radius: 10px;
        background: linear-gradient(left, #212121, #323232);
    }

    .scrollbar-simple::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: linear-gradient(left, #4A4A4A, #404040);
        box-shadow: inset 0 0 1px 1px #191919;
    }

    .scrollbar-simple::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(left, #555555, #4e4e4e);
    }

</style>
<!-- Page heading -->
<div class="flex-1 p-5 overflow-hidden">
    <div
        class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">RedRocketStore - Gerenciação de Estoque</h1>
        <div class="space-y-6 md:space-x-2 md:space-y-0">
        </div>
    </div>

    <h3 class="mt-6 text-xl">Produtos</h3>

    <div class="my-2 overflow-x-hidden sm:-mx-6 lg:-mx-8">
        <div class="min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="border-b border-gray-200 rounded-md shadow-md">

                <div style="width: 97%;" class="md:">
                    <div class="overflow-y-auto scrollbar-simple" style="height: 90%">
                        <div class="overflow-x-auto">
                            <div class="grid grid-cols-8 gap-2">
                                <div class="col-span-6 overflow-auto scrollbar-simple scroller hide-scrollbar"
                                    id="table_content" onscroll="OnScroll(this, 'table_links')">
                                    <x-table id="content_table">
                                        <x-slot name="heading">
                                            <x-table-heading>Produto</x-table-heading>
                                            <x-table-heading>Descrição</x-table-heading>
                                            <x-table-heading>Modelo</x-table-heading>
                                            <x-table-heading>Quantidade</x-table-heading>
                                            <x-table-heading>Adicionado em</x-table-heading>
                                            <x-table-heading>Cor</x-table-heading>
                                        </x-slot>
                                        <x-slot name="body">
                                            @foreach ($products as $product)
                                                <x-table-item :product="$product">
                                                    <td colspan="6" class="whitespace-nowrap">
                                                        <p style="height: 26vh;">Conteúdo</p>
                                                    </td>
                                                </x-table-item>
                                            @endforeach
                                        </x-slot>
                                    </x-table>
                                </div>
                                <div class="col-span-2 scrollbar-simple">
                                    <div class="scrollbar-simple overflow-y-auto" style="height: 90vh;" id="table_links"
                                        onscroll="OnScroll(this, 'table_content')">
                                        <x-table id="links_table">
                                            <x-slot name="heading">
                                                <div class="">
                                                    <x-table-heading :scope="'colgroup'" colspan="2"
                                                        class="text-center">
                                                        Ações
                                                    </x-table-heading>

                                            </x-slot>

                                            <x-slot name="body">
                                                @foreach ($products as $product)
                                                    <x-table-link :product="$product">
                                                        <td colspan="2" class="whitespace-nowrap border-l grid grid-cols-2 gap-2 place-items-center">
                                                            <p class="col-span-2" style="height: 26vh;">Links extras</p>
                                                        </td>
                                                    </x-table-link>
                                                @endforeach
                                            </x-slot>
                                        </x-table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t"></div>
        @if ($products->count())
            <div class="p-4 pt-8 pl-12">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
</div>
</div>
</div>

<script language="javascript">
    function OnScroll(current, target) {
        var d1 = document.getElementById(target);
        d1.scrollTop = current.scrollTop;
    }
</script>

<script>
    $(function() {
        $("td[colspan=6]").find("p").hide();
        $("td[colspan=2]").find("p").hide();
        $("table").click(function(event) {
            event.stopPropagation();
            var $target = $(event.target);
            var row_index = ($target.closest("tr").index());
            var original = row_index;

            if (row_index == 0) {
                row_index = 1;

            } else if (row_index > 1 && row_index % 2 == 0) {
                row_index += 1;
            }
            if ($target.closest('table[id]').attr('id') == "links_table") {
                var $extra = $("#content_table tr").eq(row_index);
            } else if ($target.closest('table[id]').attr('id') == "content_table") {
                var $extra = $("#links_table tr").eq(row_index);
            }

            if ($target.closest("td").attr("colspan") > 1) {
                $target.slideUp();
            }
            if ($extra.closest("td").attr("colspan") > 1) {
                $extra.slideUp();
            } else {
                $target.closest("tr").next().find("p").slideToggle();
                $extra.closest("tr").next().find("p").slideToggle();
            }
        });
    });
</script>

<x-footer />
