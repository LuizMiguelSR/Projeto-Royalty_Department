<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Holerite;

class HoleriteController extends Controller
{

    public function consulta(Request $request)
    {
        $userId = Auth::id();
        $mes = $request->input('mes');
        $ano = $request->input('ano');

        $holerites = Holerite::select('*')
                    ->where('id_funcionario', $userId)
                    ->whereYear('data_holerite', $ano)
                    ->whereMonth('data_holerite', $mes)
                    ->get();

        return view('holerite', ['holerites' => $holerites]);
    }

}
