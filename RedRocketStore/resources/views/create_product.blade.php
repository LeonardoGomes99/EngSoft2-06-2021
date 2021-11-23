<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Produto</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            <h3 class="font-bold text-2xl">Entre com as Info dos Produtos</h3>
        </section>

        <section class="mt-10">
            @csrf
            <div id="formProduct" class="flex flex-col" >
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Nome</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="nomeProd" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Descrição</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <textarea type="text" id="DescPrd" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required></textarea>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Quantidade</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="number" id="qntProd" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Modelo</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="ModelProd" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Numero Serial</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="NserialProd" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Cor</label>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <input type="text" id="CorProd" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
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
  var nome = $('#nomeProd').val();
  var desc = $('#DescPrd').val();
  var qnt = $('#qntProd').val();
  var model = $('#ModelProd').val();
  var serial = $('#NserialProd').val();
  var cor = $('#CorProd').val();

  StoreProduct(nome, desc, qnt, model, serial, cor);
});

function StoreProduct(nome, desc, qnt, model, serial, cor){
  $.ajax({
    type:'POST',
    url:'/store',
    dataType: 'JSON',
    data: {
      'nome' : nome,
      'desc' : desc,
      'qnt' : qnt,
      'model' : model,
      'serial' : serial,
      'cor' : cor
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
      LoginAccount(data);
    },
    error:function(data){
      alert(data['responseJSON']['message']);
    }
  });
}

function LoginAccount(data){
  window.location = (data['message']);
}

  
</script>
</html>