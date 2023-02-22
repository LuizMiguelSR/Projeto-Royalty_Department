<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Funcionario;
use App\Models\Departamento;

class GerenciarFuncionarioController extends Controller
{
    public function index()
    {
        $gerenciar = Auth::user()->funcionario->gerenciar;
        $funcionarios = Funcionario::paginate(5);
        $departamentos = Departamento::all();
        return view('gerenciarFuncionarios', compact('gerenciar', 'funcionarios', 'departamentos'));
    }

    public function consultaFuncionario(Request $request)
    {
        $nome = $request->query('nome_funcionario');
        $departamento = $request->query('departamento');

        $query = Funcionario::query();

        if ($nome) {
            $query->where('nome_funcionario', 'like', '%' . $nome . '%');
        }

        if ($departamento) {
            $query->whereHas('departamento', function($q) use($departamento) {
                $q->where('departamento_nome', $departamento);
            });
        }

        $funcionarios = $query->paginate(5);
        $departamentos = Departamento::all();

        return view('gerenciarFuncionarios', compact('funcionarios', 'departamentos'));
    }
}
