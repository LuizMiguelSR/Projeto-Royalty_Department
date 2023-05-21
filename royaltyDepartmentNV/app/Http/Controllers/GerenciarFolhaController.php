<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use App\Models\FolhaPagamento;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GerenciarFolhaController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        $funcionarios = Funcionario::all();

        $final = 0.00;

        for ($i = 0; $i < count($funcionarios); $i++) {
            if ($funcionarios[$i]['status'] == 'ativado') {
                $funcionario_ativo = [
                    'nome' => $funcionarios[$i]['nome_funcionario'],
                    'cargo' => $departamentos[$i]['cargo'],
                    'salario' => $departamentos[$i]['salario_base'],
                    'departamento' => $departamentos[$i]['departamento_nome']
                ];
                $funcionarios_ativos[] = $funcionario_ativo;
                $final += floatval($departamentos[$i]['salario_base']);
            }
        }

        $fgts = $final * floatval(0.0800);
        $inss = $final * floatval(0.2000);
        $sistemaS = $final * floatval(0.0580);
        $rat = $final * floatval(0.0200);
        $total = $final + $fgts + $inss + $sistemaS + $rat;
        $valor = [$fgts, $inss, $sistemaS, $rat, $total];

        return view('gerenciarFolha', compact('valor','funcionarios_ativos', 'departamentos'));
    }

    public function create()
    {
        $ano = date('Y');
        $mes = date('m');
        $folha = FolhaPagamento::select('*')
                    ->whereYear('data_folha', $ano)
                    ->whereMonth('data_folha', $mes)
                    ->first();

        if (!$folha) {
            $departamentos = Departamento::all();
            $funcionarios = Funcionario::all();
            $data_atual = Carbon::now('America/Sao_Paulo')->toDateString();

            $final = 0.00;

            for ($i = 0; $i < count($funcionarios); $i++) {
                if ($funcionarios[$i]['status'] == 'ativado') {
                    $final += floatval($departamentos[$i]['salario_base']);
                }
            }

            $fgts = $final * floatval(0.0800);
            $inss = $final * floatval(0.2000);
            $sistemaS = $final * floatval(0.0580);
            $rat = $final * floatval(0.0200);
            $total = $final + $fgts + $inss + $sistemaS + $rat;
            $valor = [$fgts, $inss, $sistemaS, $rat, $total];

            for ($i = 0; $i < count($funcionarios); $i++) {
                if ($funcionarios[$i]['status'] == 'ativado') {
                    $funcionario_ativo = [
                        'id_funcionario' => $funcionarios[$i]['id'],
                        'data_folha' => $data_atual,
                        'nome_funcionario' => $funcionarios[$i]['nome_funcionario'],
                        'cargo' => $departamentos[$i]['cargo'],
                        'departamento_nome' => $departamentos[$i]['departamento_nome'],
                        'salario_base' => $departamentos[$i]['salario_base'],
                        'inss' => $valor[1],
                        'sistema_s' => $valor[2],
                        'rat' => $valor[3],
                        'fgts' => $valor[0],
                        'total' => $valor[4]
                    ];
                    $funcionario_ativos = FolhaPagamento::create($funcionario_ativo);
                }
            }
            return redirect()->route('gerenciar_folha.index')->with('sucess', 'A folha de pagamento foi registrada com sucesso.');
        } else {
            return redirect()->route('gerenciar_folha.index')->with('error', 'A folha de pagamento deste mês já foi registrada.');
        }
    }

    public function show(Request $request)
    {
        $data = $request->input('data_hora_inicio');
        if ($data == null) {
            $ano = date('Y');
            $mes = date('m');
        } else {
            $componentes = explode("-", $data);
            $ano = $componentes[0];
            $mes = $componentes[1];
        }

        $folha = FolhaPagamento::select('*')
                    ->whereYear('data_folha', $ano)
                    ->whereMonth('data_folha', $mes)
                    ->get();

        return view('gerenciarFolha', ['folhas' => $folha]);
    }
}
