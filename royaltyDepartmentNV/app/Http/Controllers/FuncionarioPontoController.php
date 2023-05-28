<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\FuncionarioPonto;
use App\Models\FolhaPonto;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class FuncionarioPontoController extends Controller
{
    public function create()
    {
        $registros = Auth::user()->registros;
        return view('funcionarioPonto', compact('registros'));
    }

    public function store(Request $request)
    {
        $funcionario_id = Auth::id();
        $data_atual = Carbon::now('America/Sao_Paulo')->toDateString();
        $ultimo_registro = FuncionarioPonto::where('id_funcionario', $funcionario_id)
            ->where('diames', $data_atual)
            ->orderBy('id', 'desc')
            ->first();
        if (!$ultimo_registro) {
            // Se não houver registros para o dia atual, cria um novo registro com a entrada
            $novo_registro = new FuncionarioPonto();
            $novo_registro->id_funcionario = $funcionario_id;
            $novo_registro->diames = $data_atual;
            $novo_registro->entrada = Carbon::now('America/Sao_Paulo');
            $novo_registro->save();
            Session::flash('sucess', 'Entrada registrada.');
        } elseif (!$ultimo_registro->almoco_sai) {
            // Se a entrada e a saída do almoço ainda não foram registradas, registra a saída do almoço
            $ultimo_registro->almoco_sai = Carbon::now('America/Sao_Paulo');
            $ultimo_registro->save();
            Session::flash('sucess', 'Saída para o intervalo registrada.');
        } elseif (!$ultimo_registro->almoco_che) {
            // Se a saída do almoço e o retorno do almoço ainda não foram registrados, registra o retorno do almoço
            $ultimo_registro->almoco_che = Carbon::now('America/Sao_Paulo');
            $ultimo_registro->save();
            Session::flash('sucess', 'Retorno do intervalo registrada.');
        } elseif (!$ultimo_registro->saida) {
            // Se a entrada, a saída do almoço e a volta do almoço já foram registrados, registra a saída e calcula as horas trabalhadas
            $ultimo_registro->saida = Carbon::now('America/Sao_Paulo');
            $ultimo_registro->save();
            Session::flash('sucess', 'Saída registrada.');
        }
        // Busca todos os registros para o dia atual e envia para a view
        $registros = FuncionarioPonto::where('id_funcionario', $funcionario_id)
            ->where('diames', $data_atual)
            ->get();
        return view('funcionarioPonto', compact('registros'));
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $data = $request->input('data_hora_inicio');
        if ($data == null) {
            $ano = date('Y');
            $mes = date('m');
        } else {
            $componentes = explode("-", $data);
            $ano = $componentes[0];
            $mes = $componentes[1];
        }

        $folha = FolhaPonto::select('*')
                ->where('id_funcionario', $userId)
                ->whereYear('diames', $ano)
                ->whereMonth('diames', $mes)
                ->get();

        return view('folhaPonto', ['folha' => $folha]);
    }
}
