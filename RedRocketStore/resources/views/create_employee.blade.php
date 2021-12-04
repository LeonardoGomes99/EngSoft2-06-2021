<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Funcionário</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        /* .body-bg {
            background-color: #FF0000;
            background-image: linear-gradient(315deg, #4A0000 0%, #FF0000 74%);
        } */
    </style>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4xl font-bold text-white text-center">Red Rocket Store</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Entre com as Informações do Funcionário</h3>
        </section>

        <section class="mt-10">
            @csrf
            <div id="formProduct" class="flex flex-col" >
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Nome</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="nome" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">CPF</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="number" id="cpf" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Data de Nascimento</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="date" id="dataNasc" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Genero</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="genero" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Cargo</label>
                <div class="mb-12 pt-6 rounded">
                    <select class="form-select form-select-sm" id="select-role" name="select">
                        <option value="manager">Gerente</option>
                        <option value="employee">Funcionário</option>
                    </select>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Senha</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="senha" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <button id="cadastrar" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">Cadastrar</button>
            </div>
        </section>
    </main>

    <!-- <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">Don't have an account? <a href="#" class="font-bold hover:underline">Sign up</a>.</p>
    </div>

    <footer class="max-w-lg mx-auto flex justify-center text-white">
        <a href="#" class="hover:underline">Contact</a>
        <span class="mx-3">•</span>
        <a href="#" class="hover:underline">Privacy</a>
    </footer> -->
</body>
<script>

$( "#cadastrar" ).click(function() {
  var nome = $('#nome').val();
  var cpf = $('#cpf').val();
  var dataNasc = $('#dataNasc').val();
  var genero = $('#genero').val();
  var email = $('#email').val();
  var cargo = $('#select-role').find(":selected").val();
  var senha = $('#senha').val();

  StoreUser(nome, cpf, dataNasc, genero, email, cargo, senha);
});

function StoreUser(nome, cpf, dataNasc, genero, email, cargo, senha){
  $.ajax({
    type:'POST',
    url:'/store-user',
    dataType: 'JSON',
    data: {
      'nome' : nome,
      'cpf' : cpf,
      'dataNasc' : dataNasc,
      'genero' : genero,
      'email' : email,
      'cargo' : cargo,
      'senha' : senha
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
      location.href="/dashboard";
    },
    error:function(data){
      alert(data['responseJSON']['message']);
    }
  });
}

  
</script>
</html>