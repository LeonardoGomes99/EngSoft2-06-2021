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

<div class="flex-1 p-5 overflow-hidden">
    <x-page-heading> RedRocketStore - Controle de Estoque </x-page-heading>

    <div class="grid grid-cols-2 gap-2 place-items-center p-4 pt-2 pr-12">
        <x-text-heading heading=1 override=true class="mt-6 text-xl place-self-start">Produtos</x-text-heading>
        <x-click-actions.fake-button :href="route('create-product')" class="place-self-end">
            Adicionar produto
        </x-click-actions.fake-button>
    </div>

    <!-- Quite some work and I don't really think it was worth it but hey, this file has less lines! -->
    <x-table.default-table
    :heading-position="'sticky'"
    :products="$products"
    >
        <x-slot name='headings'>
            Produto
            Descrição
            Modelo
            Quantidade
            Adicionado em
            Cor
        </x-slot>
        <x-slot name='headings2'>
            Ações
        </x-slot>
    </x-table.default-table>
</div>


<!-- TODO: put this on the proper place !-->
<script>
    function OnScroll(current, target) {
        var d1 = document.getElementById(target);
        d1.scrollTop = current.scrollTop;
    }
    $(function() {
        /*
            Finds the rows to hide. Do note that  rows refer to somewhat disguised 'td' tags.
            This code will only hide the rows with a matching colspan.
        */
        var content_table_colspan = 6;
        var links_table_colspan = 2;
        $("td[colspan=" + content_table_colspan + "]").find("p").hide();
        $("td[colspan=" + links_table_colspan + "]").find("p").hide();

        // Onclick event for all 'table' tags
        $("table").click(function(event) {
            event.stopPropagation();

            var $target = $(event.target);

            // We want the index of the row that is being clicked at.
            var row_index = ($target.closest("tr").index());

            if (row_index == 0) {
                row_index = 1;

            // The code doesn't seem to work without this for some reason.
            // Only alters even values. Odd values do not need to be changed.
            } else if (row_index > 1 && row_index % 2 == 0) {
                row_index += 1;
            }

            // Gets the opposite table.
            // This probably should be a proper method.
            if ($target.closest('table[id]').attr('id') == "links_table") {
                var $extra = $("#content_table tr").eq(row_index);
            } else if ($target.closest('table[id]').attr('id') == "content_table") {
                var $extra = $("#links_table tr").eq(row_index);
            }

            // Closes the target rows.
            if ($target.closest("td").attr("colspan") > 1) {
                $target.slideUp();
            }
            if ($extra.closest("td").attr("colspan") > 1) {
                $extra.slideUp();
            } else {
                // Toggles if the row is the target rows are visible or not
                $target.closest("tr").next().find("p").slideToggle();
                $extra.closest("tr").next().find("p").slideToggle();
            }
        });
    });
</script>

<x-footer />
