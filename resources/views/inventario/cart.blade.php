@extends('adminlte::page')

@section('title', 'Inventário')

@section('content_header')
    <h1 class="m-0 text-dark">Seu carrinho</h1>
@stop

@section('content')

@include('includes.alerts')
               
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Itens</h3> 
      
      <div class="card-tools">

        {{-- <form action="{{ route('search.cart') }}" method="POST" role="search">
          {!! csrf_field() !!}

          <div class="input-group input-group-sm" style="width: 150px;">                                  
            <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>          
          </div>
          
        </form> --}}
      </div>
    </div>    
      <!-- /.card-header -->

    <div class="card-body table-responsive p-0">
      <table class="table text-nowrap">
        <thead>
          <tr>          
            <th>ID</th>
            <th>Nome</th>                                  
            <th>Tipo</th>  
            <th>Preço</th> 
            <th>Remover do carrinho</th> 
          </tr>
        </thead>

        <tbody>

          @forelse ($items as $item)
            <tr>              
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>                                      
              <td>{{ $types[($item->type_id)-1]->name  }}</td>  <!-- (-1 pois o array começa em 0) -->
              <td>R$ {{ money_format('%.2n', $item->price) }}</td>

              
                <td>
                  <form method="post" action="{{ route('cart.remove', $item->id) }}">
                    {!! csrf_field() !!} 
                    <button type="submit" class=" fas fa-minus-circle"></button>
                  </form>

                  <!--
                  <form method="post" class="delete_form" action="{{ action('Admin\InventController@delete', ['id' => $item->id]) }}">
                    {!! csrf_field() !!} 
                    <button type="submit" class="btn btn-danger fas fa-trash-alt float-right" 
                            onclick="return confirm('Tem certeza que deseja deletar?')"> Deletar
                    </button>
                  </form> 
                  -->
                </td>              
                            
            </tr>
          @empty
          @endforelse  

        </tbody>
      </table>
    </div>
      <!-- /.card-body -->     
  </div>

  @if ($items->get('0') != null)     
    <div class="card">
      <div class="card-body">
        <tr>        
          <td><strong>Preço total</strong>: R$ {{ money_format('%.2n', $totalPrice ?? '') }}</td>               
        </tr>
      </div>    
    </div>
  @endif 

@stop
