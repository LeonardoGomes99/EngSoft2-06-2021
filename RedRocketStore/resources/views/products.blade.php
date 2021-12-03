
<table id="table-products" class="items-center bg-transparent w-full border-collapse ">
  <thead>
    <tr>
      <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Nome
                  </th>
    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Descrição
                  </th>
      <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Quantidade
                  </th>
    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Modelo
                  </th>
  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                      Numero Serial
                  </th>  
  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                      Cor
                  </th> 
  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                      Editar
                  </th>   
  <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                      Remover
                  </th>        
    </tr>
  </thead>
  <tbody>
  @foreach($productsData as $products)     
    <tr>
      <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
        {{ $products->name }}
      </th>
      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
      {{ $products->description }}
      </td>
      <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
      {{ $products->quantity }}
      </td>
      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $products->model }}
      </td>
      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $products->serial_number }}
      </td>
      <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
        {{ $products->color }}
      </td>
      <td id="editProduct" class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
      <a href={{ '/edit/'.$products->id }} >Editar</a>
      </td>
      <td id="removeProduct" class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
      <button id={{ $products->id }}>Remover</button>
      </td>
    </tr>
    @endforeach  
  </tbody>
</table>


<script>

$(document).ready( function () {
    $('#table-products').DataTable();
} );

$( "#removeProduct button" ).click(function() {
  var id = $(this).attr("id");
  RemoveProduct(id);
});

$( "#editProduct button" ).click(function() {
  var id = $(this).attr("id");
  EditProduct(id);
});

function RemoveProduct(id){
  $.ajax({
    type:'POST',
    url:'/delete',
    dataType: 'JSON',
    data: {
      'id':id
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
      Reload();
    },
    error:function(data){
      alert(data['responseJSON']['message']);
    }
  });
}

function EditProduct(id){
  $.ajax({
    type:'POST',
    url:'/edit/'+id,
    dataType: 'JSON',
    data: {
      'id':id
    },  
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
      Redirect(id);
    },
    error:function(data){
      alert("Erro no sistema");
    }
  });
}

function Redirect(id){
  window.location = '/edit/'+id;
}

function Reload(){
  window.location.reload();
}
</script>