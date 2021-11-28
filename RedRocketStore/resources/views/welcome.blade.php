<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Rocket Store</title>
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
            <h3 class="font-bold text-2xl">Bem vindo ao Sistema de Estoque</h3>
            <p class="text-gray-600 pt-2">Entre com sua Conta</p>
        </section>

        <section class="mt-10">
            @csrf
            <div id="formLogin" class="flex flex-col" >
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" name="email" id="emailForm" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Senha</label>
                    <input type="password" name="password" id="passwordForm" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-gray-600 transition duration-500 px-3 pb-3" required>
                </div>
                <div class="flex justify-end">
                    <a href="#" class="text-sm text-red-600 hover:text-red-700 hover:underline mb-6">Esqueceu sua Senha?</a>
                </div>
                <button id="Logar" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">Entrar</button>
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

$( "#Logar" ).click(function() {
  var email = $('#emailForm').val();
  var pass = $('#passwordForm').val();
  Send(email,pass);
});

function Send(email,pass){
  $.ajax({
    type:'POST',
    url:'/authenticatedLogin',
    dataType: 'JSON',
    data: {
      "email": email,
      "pass" : pass
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
      LoginAccount(data);
    },
    error:function(data){
      alert(data['responseJSON']['message']);
    },
    async:false,
  });
}

function LoginAccount(data){
  window.location = (data['message']);
}

  
</script>
</html>