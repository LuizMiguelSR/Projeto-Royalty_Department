<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FolhaPonto;

class FolhaPontoController extends Controller
{
    public function folhaPonto()
    {
        $folhaPonto = FolhaPonto::all();
        return view('folhaPonto', compact('folhaPonto'));
    }

    public function consultaPonto(Request $request)
    {
        $userId = Auth::id();
        $mes = $request->input('mes');
        $ano = $request->input('ano');

        $folha = FolhaPonto::select('*')
                    ->where('id_funcionario', $userId)
                    ->whereYear('diames', $ano)
                    ->whereMonth('diames', $mes)
                    ->get();

        return view('folhaPonto', ['folha' => $folha]);
    }
}
