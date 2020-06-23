@extends('adminlte::page')

@section('title', 'Editar item')

@section('content_header')
    <h1 class="m-0 text-dark">Preencha os campos para adicionar um item</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                  @include('includes.alerts')      

                <form role="form" method="POST" action="{{ action('Admin\InventController@updateItem', $id) }}">
                  {!! csrf_field() !!}

                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputName">Nome</label>
                          <input type="name" name="name" class="form-control" id="exampleInputName" value="{{ $item->name }}">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputAmount">Quantidade</label>
                            <input type="amount" name="amount" class="form-control" id="exampleInputAmount" value="{{ $item->amount }}">
                          </div>
                          
                                                    
                          <div class="form-group">
                            <label for="exampleInputAmount">Descrição</label>
                            <input type="text" name="description" class="form-control" id="exampleInputAmount" value="{{ $item->description }}">
                          </div>

                          <div class="form-group">
                            <label>Selecione o tipo do item</label>
                            <select class="form-control" name="Type">
                              @forelse ($types as $type)
                                <option>{{ $type->name }}</option>
                              @empty
                              @endforelse                          
                            </select>
                          </div>  
                          
                                
                          <button type="submit" class="btn btn-primary">Salvar Alteração</button>

                        </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
@stop
