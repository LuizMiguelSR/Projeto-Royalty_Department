<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuncionarioPonto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FuncionarioPontoController extends Controller
{
    public function index()
    {
        $registros = Auth::user()->funcionario->registros;
        return view('funcionarioPonto', compact('registros'));
    }

    public function registraPonto(Request $request)
    {
        $funcionario_id = Auth::id();
        $data_atual = Carbon::now('America/Sao_Paulo')->toDateString();

        $ultimo_registro = FuncionarioPonto::where('id_funcionario', $funcionario_id)
            ->where('diames', $data_atual)
            ->orderBy('id_funcionario_ponto', 'desc')
            ->first();

        $novo_registro = new FuncionarioPonto();

        if (!$ultimo_registro) {
            $novo_registro->id_funcionario = $funcionario_id;
            $novo_registro->diames = $data_atual;
            $novo_registro->entrada = Carbon::now('America/Sao_Paulo');
            $novo_registro->save();
        } elseif (!$ultimo_registro->almoco_sai) {
            $ultimo_registro->almoco_sai = Carbon::now('America/Sao_Paulo');
            $ultimo_registro->save();
        } elseif (!$ultimo_registro->almoco_che) {
            $ultimo_registro->almoco_che = Carbon::now('America/Sao_Paulo');
            $ultimo_registro->save();
        } elseif (!$ultimo_registro->saida) {
            $ultimo_registro->saida = Carbon::now('America/Sao_Paulo');
            $ultimo_registro->horas_trabalhadas = Carbon::parse($ultimo_registro->saida)->diffInHours($ultimo_registro->entrada);
            $ultimo_registro->save();
        }

        $registros = FuncionarioPonto::where('id_funcionario', $funcionario_id)
            ->where('diames', $data_atual)
            ->get();

        return view('funcionarioPonto', compact('registros'));
    }
}
