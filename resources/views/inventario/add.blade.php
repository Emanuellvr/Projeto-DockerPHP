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
                            <label for="exampleInputAmount">Quantidade</label>
                            <input type="amount" name="amount" class="form-control" id="exampleInputAmount" placeholder="Quantidade do item">
                          </div>       
                          
                          <div class="col-sm-6">
                            <!-- Area de textp -->
                            <div class="form-group">
                              <label>Descrição</label>
                              <textarea class="form-control" name="description" rows="3" placeholder="Descrição do item"></textarea>
                            </div>
                          </div>
        
                        <div>
                          <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
@stop
