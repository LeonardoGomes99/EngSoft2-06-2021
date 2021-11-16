<x-header :search="false" />

<x-setting :border="'border-0'">
    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-rows-auto place-items-center">
            <img src="{{ asset('images/redrocket.png') }}" width="96" height="96">
            <label class="text-4xl font-bold text-left tracking-wide pt-8">RedRocketStore</label>
            <label class="text-2xl my-4">Controle de Estoque</label>
            <label class="text-1xl my-4">Faça login para prosseguir.</label>
        </div>

        <x-form.input name="email" :title="'E-Mail'" placeholder="Insira o seu E-Mail" required />
        <x-form.input name="password" :title="'Senha'" placeholder="Insira a sua senha" required />
        <x-form.button color='white' :rounded="'rounded'">Entrar</x-form.button>

        <p class="text-right font-bold text-sm text-blue-500 hover:text-blue-800">Esqueceu a senha?</p>
    </form>
</x-setting>

<x-footer :message="'Faça login para prosseguir.'" />
