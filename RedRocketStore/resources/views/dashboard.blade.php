<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <script src="/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/datatables.min.css">
    <script src="/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <script src="/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" src="/bootstrap.min.css">
    <link rel="stylesheet" src="/dataTables.bootstrap5.min.css">

</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ $session_user['job'] }}</a>
            <button onclick="location.href='/exportSalesData';" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Baixar Relatório
            </button>
        </div>
        @if( $session_user['job'] == 'employee' || $session_user['job'] == 'manager' )         
            <nav class="text-white text-base font-semibold pt-3">
                <a href="/create-product" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Cadastrar Produto
                </a>
            </nav>
        @endif
        @if( $session_user['job'] == 'admin' || $session_user['job'] == 'manager' )         
            <nav class="text-white text-base font-semibold pt-3">
                <a href="/create-employee" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Cadastrar Funcionário
                </a>
            </nav>                
        @endif
        @if( $session_user['job'] == 'employee' || $session_user['job'] == 'manager' )         
            <nav class="text-white text-base font-semibold pt-3">
                <a id="ReestoqueItems" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Reestocar Produto(s)
                </a>
            </nav>                
        @endif
        <nav class="text-white text-base font-semibold pt-3">
            <a href="/logout" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Sair
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->


        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ $session_user['job'] }}</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                @if( $session_user['job'] == 'employee' || $session_user['job'] == 'manager' )         
                <a href="/create-product" class="flex items-center text-white opacity-75">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Cadastrar Produto
                </a>                
                @endif

                @if( $session_user['job'] == 'employee' || $session_user['job'] == 'manager' )         
                <a href="/create-employee" class="flex items-center text-white opacity-75">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Reestocar Produto(s)
                </a>
                @endif

                @if( $session_user['job'] == 'admin' || $session_user['job'] == 'manager' )         
                <a href="/create-employee" class="flex items-center text-white opacity-75">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Cadastrar Funcionário
                </a>
                @endif
                

                <a href="/logout" class="flex items-center text-white opacity-75">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Sair
                </a>
                
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    
                <div class="flex flex-wrap mt-6">
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">Usuários</h5>
                                    <h3 class="font-bold text-3xl"> {{ count($users) }} <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">Produtos Em Estoque</h5>
                                    <h3 class="font-bold text-3xl"> {{ count($productsData) }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Vendido</h5>
                                <h3 class="font-bold text-3xl">R${{ $amount_earned }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                </div>
    
                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Produtos
                    </p>
                    <div>
                        @include('products')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Reestocar Produtos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="products">Qual Produto Deseja Reestocar ? </label>
                <br>
                <select id="product-name" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($productsData as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach                    
                </select>
                <br>
                <label for="products">Qual o Numero que irá ser reestocado ? </label>
                <input id="product-restock-number" type="number" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div class="modal-footer">
            <button id="getValuesToRestock" type="button" class="btn btn-primary">Salvar Alterações</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>  



    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>
<style>
nav{
    cursor: pointer;
}
</style>
<script>

function simulateSell(id,qtd,salesman){
  $.ajax({
    type:'POST',
    url:'simulateSells',
    dataType: 'JSON',
    data: {
      'id':id,
      'qtd':qtd,
      'salesman' : salesman,
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
    },
    error:function(data){
    }
  });
}

$('#ReestoqueItems').click(function(){
    $('.modal').modal('show');
})

$('#getValuesToRestock').click(function(){
    var product_id = $('#product-name').find(":selected").val();
    var product_restock_number = $('#product-restock-number').val();
    $.ajax({
    type:'POST',
    url:'restock_products',
    dataType: 'JSON',
    data: {
      'id':product_id,
      'qtd':product_restock_number,
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
        window.location.reload();
    },
    error:function(data){
    }
  });
})

</script>