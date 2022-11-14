<?php

use App\Http\Controllers\Api\PessoaController;
use Illuminate\Support\Facades\Route;

//Renderiza para tela inicial
Route::get('/', [PessoaController::class, 'index']);

//Rota de Criação
Route::get('/pessoas/create', [PessoaController::class, 'create']);
//Rota de Edição
Route::get('/pessoas/{id}/edit', [PessoaController::class, 'edit']);
//Rota de Atualização
Route::put('/pessoas/{id}', [PessoaController::class, 'update']);
//Rota de Exclusão
Route::delete('/pessoas/{id}', [PessoaController::class, 'destroy']);
//Rota de Listagem
Route::get('/pessoas/show', [PessoaController::class, 'show']);

//Rota de Busca
Route::get('/pessoas/buscar', [PessoaController::class, 'buscar']);
Route::get('/pessoas', [PessoaController::class, 'search']);

//Rota de Inserção
Route::post('/pessoas', [PessoaController::class, 'store']);

Route::fallback(function(){
    return view('pageNotFound');
});
