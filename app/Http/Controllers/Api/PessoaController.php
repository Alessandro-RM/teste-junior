<?php

namespace App\Http\Controllers\Api;

use App\Entitiess\Pessoa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PessoaController extends Controller
{

    // função para validar cpf
    public function validaCPF($cpf) { 
        // extrair somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        // Verifica se foi informado todos os numeros corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de numeros repetidos.
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    // ========================== /
        //ROTAS DAS PÁGINAS

    //Rota - Para a página Home
    public function index () {
        $pessoas = Pessoa::all();
        return view('home', ['pessoas' => $pessoas]);
    }

    //Rota - Para a página de criação
    public function create () {
        return view('pessoas.create');
    }

    //Rota - Para a página de listagem de pessoas
    public function show () {
        $pessoas = Pessoa::all();
        return view('pessoas.show', ['pessoas' => $pessoas]);
    }

    //Rota - Para página de pesquisa de CEP
    public function buscar () {
        return view('pessoas.buscar');
    }

    //Rota - Página de atualização
    public function edit ($id) {
        $pessoa = Pessoa::where('id', $id)->first();
        // dd($pessoa);
        if(!empty($pessoa)){
            return view('pessoas.edit', ['pessoa' => $pessoa]);
        }else{
            return redirect('/')->with('msg_error', 'Nenhuma pessoa encontrada');
        }
    }

    //========================/
        //ROTAS DE AÇÕES
    

    //Rota - Pesquisa de CEP
    public function search (Request $request) {

        if($cep = $request->input('cep')){
            //Cep vem da rota de busca e guarda na variavel CEP
            $cep = $request->input('cep');
            //Salva a url com o cep informado
            $url = "https://viacep.com.br/ws/$cep/json/";
            //Chama rota decodifica o json e envia a array com as informações
            $response = json_decode(file_get_contents($url), true);

            //Array com a resposta do json e com o CEP vindo direto da requisição
            return view('pessoas.create')->with (
                [
                    'cep' => $request->input('cep'),
                    'logradouro' => $response['logradouro'],
                    'bairro' => $response['bairro'],
                    'cidade' => $response['localidade'],
                ]
            ); 
        }else{
            return redirect('/')->with('msg_error', 'Informe um CEP válido!');
        }
    }

    //Rota - Inserção
    public function store (Request $request) {
        //Instancioando a classe do Model
        $pessoa = new Pessoa;

        // Verificação existência de campos vazios
        if(
            $request->nome === null ||
            $request->sobrenome === null ||
            $request->celular === null ||
            $request->logradouro === null || 
            $request->cep === null ||
            $request->cpf === null){
                return redirect('/')->with('msg_error', 'Falha ao cadastrar - Campos incorretos...');
        }else{
            // Verifica o CPF válido
            if($this->validaCPF($request->cpf) !== true){
                return redirect('/')->with('msg_error', 'Falha ao cadastrar - CPF Incorreto');
            }else{
                //Definindo campos para inserção
                $pessoa->nome = $request->nome;
                $pessoa->sobrenome = $request->sobrenome;
                $pessoa->celular = $request->celular;
                $pessoa->logradouro = $request->logradouro;
                $pessoa->cep = $request->cep;
                $pessoa->cpf = $request->cpf;

                $pessoa->save();
                return redirect('/')->with('msg_success', 'Cadastro realizado com sucesso!');
            }
        }
    }

    //Rota - Atualização
    public function update(Request $request, $id){
        
        // Recupera dados para atualização
        $data = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'celular' => $request->celular,
            'logradouro' => $request->logradouro,
            'cep' => $request->cep,
            'cpf' => $request->cpf,
        ];

        // Verificando existência de campos vazios
        if(
            $request->nome === null ||
            $request->sobrenome === null ||
            $request->celular === null ||
            $request->logradouro === null || 
            $request->cep === null ||
            $request->cpf === null){
                return redirect('/')->with('msg_error', 'Falha ao cadastrar - Campos incorretos...');
        }else{
            // Verificando CPF válido
            if($this->validaCPF($request->cpf) !== true){
                return redirect('/')->with('msg_error', 'Falha ao atualizar - CPF Incorreto');
            }else{
                // Execução da atualização
                Pessoa::where('id', $id)->update($data);
                return redirect('/')->with('msg_success', 'Pessoa atualizada com sucesso!');
            }
        }
    }

    //Rota - Exclusão
    public function destroy ($id) {
        Pessoa::where('id', $id)->delete();
        return redirect('/')->with('msg_success', 'Pessoa deletada com sucesso!');
    }
}
