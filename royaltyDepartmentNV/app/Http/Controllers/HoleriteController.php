<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Holerite;
use App\Models\Departamento;
use App\Models\Funcionario;

class HoleriteController extends Controller
{

    public function consulta(Request $request)
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

        $holerites = Holerite::select('*')
                    ->where('id_funcionario', $userId)
                    ->whereYear('data_holerite', $ano)
                    ->whereMonth('data_holerite', $mes)
                    ->get();

        $departamentos = Departamento::find($userId);

        return view('holerite', ['holerites' => $holerites, 'departamentos' => $departamentos]);
    }

    public function consultaId($id)
    {
        $ano = date('Y');
        $mes = date('m');
        $holerites = Holerite::select('*')
                    ->where('id_funcionario', $id)
                    ->whereYear('data_holerite', $ano)
                    ->whereMonth('data_holerite', $mes)
                    ->get();

        $departamentos = Departamento::find($id);
        $funcionarios = Funcionario::find($id);

        return view('holeriteId', ['holerites' => $holerites, 'departamentos' => $departamentos, 'funcionarios' => $funcionarios]);
    }

}
