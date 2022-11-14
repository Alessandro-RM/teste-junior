@extends('layouts.app')

@section('title', 'Listagem')

@section('content')

  @if (count($pessoas) > 0)
  <div class="show-container">
    <h2 class="titulo">Lista de pessoas</h2>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Sobrenome</th>
          <th scope="col">Celular</th>
          <th scope="col">Logradouro</th>
          <th scope="col">CEP</th>
          <th scope="col">CPF</th>
          <th class="th-atualizar" scope="col">Ação</th>
        </tr>
      </thead>
      @foreach ($pessoas as $pessoa)
      <tbody>
          <tr>
            <th scope="row">{{$pessoa->id}}</th>
            <td>{{ $pessoa->nome }}</td>
            <td>{{ $pessoa->sobrenome }}</td>
            <td>{{ $pessoa->celular }}</td>
            <td>{{ $pessoa->logradouro }}</td>
            <td>{{ $pessoa->cep }}</td>
            <td>{{ $pessoa->cpf }}</td>
            {{-- <ion-icon class="icons-delete" name="trash"></ion-icon> --}}
            <th class="d-flex p-2">
              <div class="btns">
                <a href="/pessoas/{{ $pessoa->id }}/edit" class="btn btn-success-sm">
                  <ion-icon class="icons-create" name="create"></ion-icon>
                </a>
                <form action="/pessoas/{{ $pessoa->id }}" method="POST">
                  @csrf
                  @method('delete')   
                  <ion-icon data-bs-toggle="modal" data-bs-target="#confirm-delete" class="icons-delete" name="trash"></ion-icon>

                   <!-- Modal -->
                  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Excluir Pessoa</h5>
                        </div>
                        <div class="modal-body">
                          Confirma a exclusão?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                          </button>
                          <button type="submit" class="btn btn-danger">
                            Excluir
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </th>
          </tr>
        </tbody>

      @endforeach
    </table>
    </div>
  </div>
  @else
    <div class="container mt-5 container-form">
      <h2 class="titulo">Nenhuma pessoa cadastrada</h2>
    </div>
  @endif

@endsection