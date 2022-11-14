@extends('layouts.app')

@section('title', 'Atualizar')

@section('content')
  <div class="container-form-edit mt-3">
    <h2 class="titulo">Atualizar</h2>
      <form action="/pessoas/{{ $pessoa->id }}" method="POST">
        @csrf
        @method('put') 
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Digite o nome" value="{{ $pessoa->nome }}">
          </div>
          <div class="form-group">
              <label for="sobrenome">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenome" name="sobrenome" aria-describedby="sobrenome" placeholder="Digite o sobrenome" value="{{ $pessoa->sobrenome }}">
          </div>
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="cpf" placeholder="Digite o cpf" value="{{ $pessoa->cpf }}">
          </div>
          <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" aria-describedby="celular" placeholder="Digite o celular" value="{{ $pessoa->celular }}">
          </div>

          <div class="form-group">
              <label for="cep">CEP</label>
              <input type="text" class="form-control" id="cep" name="cep" value="{{ $pessoa->cep }}">
          </div>

          <div class="form-group">
              <label for="logradouro">Logradouro</label>
              <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $pessoa->logradouro }}">
          </div>
        
          <div class="text-center">
            <button type="button" data-bs-toggle="modal" data-bs-target="#confirm-edit" class="btn btn-primary">Confirmar</button>
          </div>
           <!-- Modal -->
          <div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Editar Pessoa</h5>
                </div>
                <div class="modal-body">
                  Confirma a atualização?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                  </button>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>
            </div>
          </div>
          
        </form>
  </div>
@endsection