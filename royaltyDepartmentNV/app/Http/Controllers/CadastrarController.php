<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CadastrarController extends Controller
{
    public function cadastrarFuncionario()
    {
        return view('inserirFuncionario');
    }

    public function store(Request $request)
    {
        $dataUsuario = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:5'
        ]);

        $dataUsuario['role'] = 3;
        $dataUsuario['senha'] = bcrypt($dataUsuario['senha']);
        $usuario = Usuario::create($dataUsuario);

        $dataEndereco = $request->validate([
            'rua' => 'required|max:50',
            'numero' => 'required|max:6',
            'cep' => 'required|max:8',
            'complemento' => 'required|max:50',
            'cidade' => 'required|max:50',
            'bairro' => 'required|max:50',
            'estado' => 'required|max:50',
            'pais' => 'required|max:50'
        ]);

        $endereco = Endereco::create($dataEndereco);

        $dataDepartamento = $request->validate([
            'departamento_nome' => 'required|max:50',
            'cargo' => 'required|max:50',
            'salario_base' => 'required|max:50000'
        ]);

        $departamento = Departamento::create($dataDepartamento);

        $dataFuncionario = $request->validate([
            'nome_funcionario' => 'required|max:50',
            'registro_geral' => 'required|max:15',
            'cpf' => 'required|max:14',
            'telefone' => 'required|max:15',
            'numero_dependentes' => 'required|max:2',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // salva a imagem no sistema de arquivos
        $path = Storage::disk('public')->put('imagens', $dataFuncionario['foto']);

        // adiciona o caminho da imagem aos dados do funcionário
        $dataFuncionario['foto'] = $path;

        // cria um novo funcionário com os dados e as chaves estrangeiras
        $funcionario = new Funcionario($dataFuncionario);
        $funcionario->id_usuario = $usuario->id;
        $funcionario->id_endereco = $endereco->id;
        $funcionario->id_departamento = $endereco->id;
        $funcionario->save();

        return redirect()->route('gerenciar_funcionario');
    }


}
