<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<x-header :search=false />

<x-setting :heading="'Editar produto: ' . $product->name">
    <form method="POST" action="/" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-form.input name="Nome" value="{{old('name', $product->name)}}" required />

        <x-form.textarea name="Descrição" required >
            {{ old('description', $product->description) }}
        </x-form.textarea>

        <x-form.input value="{{ old('Quantity', $product->quantity) }}" name="Quantidade" :type="'number'" maxlength="9" max="999999" required/>


        <div class="grid grid-cols-3 gap-2 place-items-center">
            <x-form.button alignment="place-self-start">Adicionar</x-form.button>
            <x-form.button :background="'bg-red-500'" :hover="'bg-red-600'">Excluir</x-form.button>
            <x-form.field alignment="place-self-end">
                <x-fake-button link="'../dashboard'">Cancelar</x-fake-button>
            </x-form.field>
        </div>
    </form>

</x-setting>

<x-footer/>
</div>
