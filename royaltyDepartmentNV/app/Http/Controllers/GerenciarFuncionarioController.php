<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GerenciarFuncionarioController extends Controller
{
    public function index()
    {
        $gerenciar = Auth::user()->funcionario->gerenciar;
        return view('gerenciar-funcionario', compact('gerenciar'));
    }
}
