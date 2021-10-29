<x-header :search="'false'" />
<x-setting :border="'border-0'">
    <form method="POST" action="{{ route('register')}}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-rows-auto place-items-center">
            <img src="{{ asset('images/redrocket.png') }}" width="96" height="96">
            <label class="text-4xl font-bold text-left tracking-wide pt-8">RedRocketStore</label>
            <label class="text-2xl my-4">Controle de Estoque</label>
            <label class="text-1xl my-4">Crie a conta de um funcionário.</label>
        </div>

        <x-form.input name="name" title="Nome" placeholder="Insira o nome" required />
        <x-form.input name="email"title="E-Mail" :type="'email'" placeholder="Insira o E-Mail do funcuionário" required />
        <x-form.input name="password" title="Senha" :type="'password'" placeholder="Insira a senha do funcuionário" required />
        <x-form.input name="cpf" title="CPF" :type="'number'" maxlenght="11" placeholder="Insira o cpf do funcuionário" required />
        <x-form.input name="birthdate" title="Data de nascimento" :type="'date'" placeholder="Insira a data de nascimento do funcuionário" required />
        <x-form.input name="job" title="Função" placeholder="Insira o cargo do funcuionário" required />
        <x-form.input name="gender"title="Gênero" placeholder="Insira o gênero do funcuionário" required />

        <x-form.button color='white' :rounded="'rounded'">Cadastrar</x-form.button>
    </form>
</x-setting>

<x-footer :message="'Registro de funcionários.'" />
