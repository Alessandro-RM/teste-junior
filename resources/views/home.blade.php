
@extends('layouts.app')

@section('title', 'Início')

@section('content')
    
   <div class="container mt-2 container-form-search">
        <h2 class="titulo">Informe o CEP para continuar</h2>
        <form action="/pessoas" method="GET">
            <div class="mt-3">
                <input type="text" class="form-control" name="cep" placeholder="Ex: 20531-390 ou 20531390">
            </div>
            <div class="text-center">
                <button type="submit" class="btn-search">Continuar</button>           
            </div>
        </form>
    </div>
    <hr>
    <div class="container mt-3 container-form-search">
        <h2 class="titulo">Listar pessoas cadastradas</h2>
        <div class="btn-group text-center">
            <a class="btn-listar" href="/pessoas/show" class="">Listar</a>
        </div>
    </div>
@endsection