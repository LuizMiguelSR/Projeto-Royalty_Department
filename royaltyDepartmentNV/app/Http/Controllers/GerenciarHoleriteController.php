<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Holerite;
use App\Models\Funcionario;
use App\Models\Departamento;
use Carbon\Carbon;

class GerenciarHoleriteController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == '1') {
            $funcionariosPage = Funcionario::where('status', 'ativado')->paginate(5);
            $funcionarios = $funcionariosPage->map(function ($funcionario) {
                $departamento = Departamento::find($funcionario->id_departamento);
                $funcionario->departamento = $departamento;
                return $funcionario;
            });

            $mesAtual = date('n');
            $meses = [
                1 => 'Janeiro',
                2 => 'Fevereiro',
                3 => 'Março',
                4 => 'Abril',
                5 => 'Maio',
                6 => 'Junho',
                7 => 'Julho',
                8 => 'Agosto',
                9 => 'Setembro',
                10 => 'Outubro',
                11 => 'Novembro',
                12 => 'Dezembro'
            ];

            $mesAtual = $meses[$mesAtual];

            $mesAtualUpper = mb_strtoupper($mesAtual, 'UTF-8');

            return view('gerenciarHolerites', compact('funcionarios', 'funcionariosPage', 'mesAtualUpper'));
        } else {
            return redirect()->route('home')->with('error', 'Este usuário não tem permissão para acessar esta página');
        }
    }

    public function show($id)
    {
        if (Auth::user()->role == '1') {
            $funcionario = Funcionario::find($id);
            $ano = date('Y');
            $mes = date('m');
            $holerite = Holerite::select('*')
                        ->where('id_funcionario', $id)
                        ->whereYear('data_holerite', $ano)
                        ->whereMonth('data_holerite', $mes)
                        ->first();

            if (!$holerite) {
                $departamento = Departamento::find($id);
                $funcionario = Funcionario::find($id);
                $data_atual = Carbon::now('America/Sao_Paulo')->toDateString();

                $numeroDependentes = $funcionario->numero_dependentes;
                $salarioBase = $departamento->salario_base;

                $faixa1 = 0.0;
                $faixa2 = 0.0;
                $faixa3 = 0.0;
                $faixa4 = 0.0;
                $totalINSS = 0.0;

                $inss_salario_fx1 = 1213.5000;
                $inss_salario_fx2 = 2427.3500;
                $inss_salario_fx3 = 3642.0300;
                $inss_salario_fx4 = 7087.2200;

                $inss_aliquota_fx1 = 0.0750;
                $inss_aliquota_fx2 = 0.0900;
                $inss_aliquota_fx3 = 0.1200;
                $inss_aliquota_fx4 = 0.1400;

                if ($salarioBase > (floatval($inss_salario_fx3 + 0.01))) {
                    if ($salarioBase < floatval($inss_salario_fx4)) {
                        $faixa4 = ($salarioBase - (floatval($inss_salario_fx3 + 0.01))) * floatval($inss_aliquota_fx4);
                    } else {
                        $faixa4 =  (floatval($inss_salario_fx4) - (floatval($inss_salario_fx3 + 0.01))) * floatval($inss_aliquota_fx4);
                    }
                }
                if ($salarioBase > (floatval($inss_salario_fx2 + 0.01))){
                    if ($salarioBase < floatval($inss_salario_fx3)) {
                        $faixa3 = ($salarioBase - (floatval($inss_salario_fx2 + 0.01))) * floatval($inss_aliquota_fx3);
                    } else {
                        $faixa3 = (floatval($inss_salario_fx3) - (floatval($inss_salario_fx2 + 0.01))) * floatval($inss_aliquota_fx3);
                    }
                }
                if ($salarioBase > (floatval($inss_salario_fx1) + 0.01)){
                    if ($salarioBase < floatval($inss_salario_fx2)) {
                        $faixa2 = ($salarioBase - (floatval($inss_salario_fx1) + 0.01)) * floatval($inss_aliquota_fx2);
                    } else {
                        $faixa2 = (floatval($inss_salario_fx2) - (floatval($inss_salario_fx1) + 0.01)) * floatval($inss_aliquota_fx2);
                    }
                }
                if ($salarioBase > floatval($inss_salario_fx1)){
                    $faixa1 = floatval($inss_salario_fx1) * floatval($inss_aliquota_fx1);
                }

                $totalINSS = $faixa1 + $faixa2 + $faixa3 + $faixa4;
                $valorINSS = [$faixa1, $faixa2, $faixa3, $faixa4, $totalINSS];

                $baseCalculo = $salarioBase - $totalINSS - ($numeroDependentes * 189.59);

                $faixa1 = 0.0;
                $faixa2 = 0.0;
                $faixa3 = 0.0;
                $faixa4 = 0.0;
                $faixa5 = 0.0;
                $totalIRRF = 0.0;

                $irrf_salario_fx1 = 1903.9800;
                $irrf_salario_fx2 = 2826.6500;
                $irrf_salario_fx3 = 3751.0500;
                $irrf_salario_fx4 = 4664.6800;
                $irrf_salario_fx5 = 4664.6900;

                $irrf_aliquota_fx1 = 0.0000;
                $irrf_aliquota_fx2 = 0.0750;
                $irrf_aliquota_fx3 = 0.1300;
                $irrf_aliquota_fx4 = 0.2250;
                $irrf_aliquota_fx5 = 0.2750;

                if ($baseCalculo > floatval($irrf_salario_fx4)) {
                    $faixa5 = ($baseCalculo  - floatval($irrf_salario_fx4)) * floatval($irrf_aliquota_fx5);
                }
                if ($baseCalculo > floatval($irrf_salario_fx3)) {
                    if ($baseCalculo < (floatval($irrf_salario_fx4) - 0.01)) {
                        $faixa4 = ($baseCalculo - (floatval($irrf_salario_fx3) - 0.01)) * floatval($irrf_aliquota_fx4);
                    } else {
                        $faixa4 = (floatval($irrf_salario_fx4) - floatval($irrf_salario_fx3)) * floatval($irrf_aliquota_fx4);
                    }
                }
                if ($baseCalculo > (floatval($irrf_salario_fx2) + 0.01)){
                    if ($baseCalculo < floatval($irrf_salario_fx3)) {
                        $faixa3 = ($baseCalculo - (floatval($irrf_salario_fx2) + 0.01)) * floatval($irrf_aliquota_fx3);
                    } else {
                        $faixa3 = (floatval($irrf_salario_fx3) - (floatval($irrf_salario_fx2) + 0.01)) * floatval($irrf_aliquota_fx3);
                    }
                }
                if ($baseCalculo > (floatval($irrf_salario_fx1) + 0.01)){
                    if ($baseCalculo < floatval($irrf_salario_fx2)) {
                        $faixa2 = ($baseCalculo - (floatval($irrf_salario_fx1) + 0.01)) * floatval($irrf_aliquota_fx2);
                    } else {
                        $faixa2 = (floatval($irrf_salario_fx2) - (floatval($irrf_salario_fx1) + 0.01)) * floatval($irrf_aliquota_fx2);
                    }
                }
                if ($baseCalculo > floatval($irrf_salario_fx1)){
                        $faixa1 = floatval($irrf_aliquota_fx1);
                }

                $totalIRRF = $faixa1 + $faixa2 + $faixa3 + $faixa4 + $faixa5;
                $valorIRRF = [$faixa1, $faixa2, $faixa3, $faixa4, $faixa5, $totalIRRF];

                $diasUteis = 22;
                $vt = $diasUteis * 2 * 5.00;

                $salarioLiquido = $salarioBase - $vt - $totalINSS - $totalIRRF;

                $dataHolerite = [
                    'id_funcionario' => $id,
                    'id_departamento' => $id,
                    'data_holerite' => $data_atual,
                    'inss_fx1' => $valorINSS[0],
                    'inss_fx2' => $valorINSS[1],
                    'inss_fx3' => $valorINSS[2],
                    'inss_fx4' => $valorINSS[3],
                    'inss_total' => $valorINSS[4],
                    'irrf_fx1' => $valorIRRF[0],
                    'irrf_fx2' => $valorIRRF[1],
                    'irrf_fx3' => $valorIRRF[2],
                    'irrf_fx4' => $valorIRRF[3],
                    'irrf_fx5' => $valorIRRF[4],
                    'irrf_total' => $valorIRRF[5],
                    'salario_base' => $salarioBase,
                    'salario_liquido' => $salarioLiquido
                ];
                $novoHolerite = Holerite::create($dataHolerite);
                return redirect()->route('gerenciar_holerites.index')->with('sucess', "O Holerite de $funcionario->nome_funcionario foi registrado com sucesso.");
            } else {
                return redirect()->route('gerenciar_holerites.index')->with('error', "O Holerite de $funcionario->nome_funcionario já encontra-se registrado.");
            }
        } else {
            return redirect()->route('home')->with('error', 'Este usuário não tem permissão para acessar esta página');
        }
    }

    public function consultaHoleriteFuncionario(Request $request)
    {
        if (Auth::user()->role == '1') {
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
            $funcionariosPage = $query->paginate(5);
            $funcionarios = $funcionariosPage;
            $departamentos = Departamento::all();

            $mesAtual = date('n');
            $meses = [
                1 => 'Janeiro',
                2 => 'Fevereiro',
                3 => 'Março',
                4 => 'Abril',
                5 => 'Maio',
                6 => 'Junho',
                7 => 'Julho',
                8 => 'Agosto',
                9 => 'Setembro',
                10 => 'Outubro',
                11 => 'Novembro',
                12 => 'Dezembro'
            ];

            $mesAtual = $meses[$mesAtual];

            $mesAtualUpper = mb_strtoupper($mesAtual, 'UTF-8');

            return view('gerenciarHolerites', compact('funcionarios', 'funcionariosPage', 'departamentos', 'mesAtualUpper'));
        } else {
            return redirect()->route('home')->with('error', 'Este usuário não tem permissão para acessar esta página');
        }
    }
}
