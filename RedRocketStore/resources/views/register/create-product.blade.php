<x-header :search="'false'" />
<x-setting :border="'border-0'">
    <form method="POST" action="{{ route('create-product')}}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-rows-auto place-items-center">
            <img src="{{ asset('images/redrocket.png') }}" width="96" height="96">
            <label class="text-4xl font-bold text-left tracking-wide pt-8">RedRocketStore</label>
            <label class="text-2xl my-4">Controle de Estoque</label>
            <label class="text-1xl my-4">Adicione um produto.</label>
        </div>

        <x-form.input name="name" title="Nome" placeholder="Insira o produto" required />
        <x-form.input name="description" title="Descrição" :type="'email'" placeholder="Insira a descrição do produto" required />
        <x-form.input name="color" title="Cor" placeholder="Insira a cor do produto." required />
        <x-form.input name="quantity" title="Quantidade" :type="'number'" maxlenght="11" placeholder="Insira a quantidade do produto" required />
        <x-form.input name="model" title="Modelo" placeholder="Insira o modelo do produto" required />

        <div class="grid grid-cols-2 gap-2 place-items-center">
        <x-form.button color='white' :rounded="'rounded'" alignment="place-self-start">Adicionar</x-form.button>
                    <x-form.field alignment="place-self-end">
                <x-click-actions.fake-button :href="route('index')">Cancelar</x-click-actions.fake-button>
            </x-form.field>
        </div>
    </form>
</x-setting>

<x-footer :message="'Registro de funcionários.'" />
