@extends('layouts.app')

@section('content')
    <div class="container-form-search">
        <h2 class="titulo">Informe o CEP para continuar</h2>
        <form action="/pessoas" method="GET">
            <div class="mb-3">
                <label>Informe o CEP:</label>
                <input type="text" class="form-control" name="cep" placeholder="Ex: 20531-390 ou 20531390">
            </div>
            <button type="submit" class="btn btn-primary">Continuar</button>           
        </form>
        <div class="">
            <a href="/pessoas/show" class="">Listar</a>
        </div>
    </div>
@endsection