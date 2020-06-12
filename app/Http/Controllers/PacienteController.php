<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::all();

        return $pacientes;
    }
    public function store(Request $request)
    {
        $cpf = Paciente::where('cpf', '=', $request->cpf)->value('cpf');
        if ($cpf == $request->cpf) {
            $retorno = [
                'situacao' => 'ErrorCadastro',
            ];
            return $retorno;
        } else {

            $anoNasc = explode("-", $request->nascimento);
            $anoAt = $anoNasc[0] - 2020;
            $idade = abs($anoAt);

            $cadastro = new Paciente();
            $cadastro->nome = $request->nome;
            $cadastro->cpf = $request->cpf;
            $cadastro->rg = $request->rg;
            $cadastro->cartaoSus = $request->cartaoSus;
            $cadastro->sexo = $request->sexo;
            $cadastro->nascimento = $request->nascimento;
            $cadastro->idade = $idade;
            $cadastro->mae = $request->mae;
            $cadastro->telefone = $request->telefone;
            $cadastro->cep = $request->cep;
            $cadastro->logradouro = $request->logradouro;
            $cadastro->numero = $request->numero;
            $cadastro->quadra = $request->quadra;
            $cadastro->lote = $request->lote;
            $cadastro->complemento = $request->complemento;
            $cadastro->bairro = $request->bairro;
            $cadastro->cidade = $request->cidade;
            $cadastro->uf = $request->uf;
            $cadastro->save();

            $retorno = [
                'situacao' => 'success',
            ];

            return $retorno;
        }
    }

    public function update(Request $request)
    {
        $anoNasc = explode("-", $request->nascimento);
        $anoAt = $anoNasc[0] - 2020;
        $idade = abs($anoAt);


        $cadastro = Paciente::findOrFail($request->id);
        $cadastro->nome = $request->nome;
        $cadastro->cpf = $request->cpf;
        $cadastro->rg = $request->rg;
        $cadastro->cartaoSus = $request->cartaoSus;
        $cadastro->sexo = $request->sexo;
        $cadastro->nascimento = $request->nascimento;
        $cadastro->idade = $idade;
        $cadastro->mae = $request->mae;
        $cadastro->telefone = $request->telefone;
        $cadastro->cep = $request->cep;
        $cadastro->logradouro = $request->logradouro;
        $cadastro->numero = $request->numero;
        $cadastro->quadra = $request->quadra;
        $cadastro->lote = $request->lote;
        $cadastro->complemento = $request->complemento;
        $cadastro->bairro = $request->bairro;
        $cadastro->cidade = $request->cidade;
        $cadastro->uf = $request->uf;
        $cadastro->save();

        $retorno = [
            'situacao' => 'success',
        ];

        return $retorno;
    }

    public function show($id)
    {
        $pacienteEdit = Paciente::findOrFail($id);
        $pacientes = Paciente::all();
        return view('Paciente', compact('pacienteEdit'));
    }

    //inativa paciente 
    public function inativar($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->status = 0;
        $paciente->save();

        return "204";
    }

    public function search(Request $request){
        $nome = Paciente::where('nome', 'like', '%'.$request->term.'%')->get();     

        foreach($nome as $value){
            $outra [] = $value->nome;
            $outra [] = $value->id;

        }
        $retorno = [
            'nome' => $nome,
            'situacao' => 'success'
        ];
        return $outra;
    }

}
