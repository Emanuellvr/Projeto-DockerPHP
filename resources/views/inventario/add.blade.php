@extends('adminlte::page')

@section('title', 'Adicionar item')

@section('content_header')
    <h1 class="m-0 text-dark">Preencha os campos para adicionar um item</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                  @include('includes.alerts') 
                    
                  <form role="form" method="POST" action="{{ route('add') }}">
                    {!! csrf_field() !!}
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputName">Nome</label>
                        <input type="name" name="name" class="form-control" id="exampleInputName" placeholder="Nome do item">
                      </div>                                            
                                                
                      <div class="form-group">
                        <label>Preço</label>
                        <input type="text" class="form-control" name="price" id="exampleInputDescription" placeholder="Preço do item"></input>
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
                      
                    <div>
                      <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                  </form>

                </div>
                
            </div>
        </div>   
        
        <div class="card">
          <div class="card-body">
            <form role="form" method="POST" action="{{ route('addType') }}">
              {!! csrf_field() !!}
              <div class="card-body">

                <label for="exampleInputName">Adcione um novo Tipo</label>
                <div class="form-group">
                  <input type="name" name="newType" class="form-control" id="exampleInputName" placeholder="Nome do novo tipo">
                </div>

              <div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>

            </form>
          </div>
        </div>

    </div>
@stop
