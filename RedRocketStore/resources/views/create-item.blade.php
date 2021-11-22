<x-header :search=false />

<x-setting :heading="'Adicionar produto'">
    <form method="POST" action="/admin/posts/{{ App\Models\Product::first()->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-form.input name="Nome" :value="old('name', App\Models\Product::first()->title)" required />

        <x-form.textarea name="Descrição" required>{{ old('description', App\Models\Product::first()->excerpt) }}
        </x-form.textarea>
        <x-form.input name="Quantidade" required>{{ old('Quantity', App\Models\Product::first()->body) }}
            </x-form.textarea>

            <div class="grid grid-cols-2 gap-2 place-items-center">
                <x-form.button>Adicionar</x-form.button>
                <x-form.button>Cancelar</x-form.button>
            </div>
    </form>

</x-setting>

<footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
    <div class="text-sm">
        RedRocketStore - Controle de Estoque
    </div>
</footer>
</div>
