<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
        ]);

        $departamento = new Departamento();
        $departamento->nome = $request->input('nome');
        $departamento->cargo = $request->input('cargo');
        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
        ]);

        $departamento->nome = $request->input('nome');
        $departamento->cargo = $request->input('cargo');
        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index');
    }
}
