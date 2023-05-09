<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class GerenciarFolhaController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        $funcionarios = Funcionario::all();

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

        return view('gerenciarFolha', compact('valor','funcionarios', 'departamentos'));
    }
}
