@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
  <div class="container-form-edit mt-3">
    <h2 class="titulo">Cadastrar</h2>
    <form action="/pessoas" method="POST">
      @csrf
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Digite o nome">
        </div>
        <div class="form-group">
          <label for="sobrenome">Sobrenome</label>
          <input type="text" class="form-control" id="sobrenome" name="sobrenome" aria-describedby="sobrenome" placeholder="Digite o sobrenome">
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="cpf" placeholder="ex: 122.222.222-22 ou 12222222222">
        </div>
        <div class="form-group">
          <label for="celular">Celular</label>
          <input type="text" class="form-control" id="celular" name="celular" aria-describedby="celular" placeholder="Digite o celular">
        </div>

        <div class="form-group">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" value="{{ $cep }}">
        </div>

        <div class="form-group">
          <label for="logradouro">Logradouro</label>
          <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $logradouro }}">
        </div>
        <div class="text-center">
          <button type="button" data-bs-toggle="modal" data-bs-target="#confirm-create" class="btn btn-primary">Confirmar</button>
        </div>
         <!-- Modal -->
         <div class="modal fade" id="confirm-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Pessoa</h5>
              </div>
              <div class="modal-body">
                Confirma?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn btn-secondary" data-bs-dismiss="modal">
                  Cancelar
                </button>
                <button type="submit" class="btn btn-success">Enviar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
  </div>
@endsection