<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Funcionario;
use App\Models\Departamento;
use App\Models\FuncionarioPonto;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Models\Holerite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class GerenciarFuncionarioController extends Controller
{
    public function index()
    {
        $funcionariosPage = Funcionario::paginate(5);
        $funcionarios = $funcionariosPage->map(function ($funcionario) {
            $departamento = Departamento::find($funcionario->id_departamento);
            $usuario = Usuario::find($funcionario->id_usuario);
            $endereco = Endereco::find($funcionario->id_endereco);
            $funcionario->departamento = $departamento;
            if ($usuario) {
                $usuario->senha = password_verify($usuario->senha, $funcionario->usuario->senha);
                $funcionario->usuario = $usuario;
            }
            $funcionario->endereco = $endereco;
            return $funcionario;
        });
        return view('gerenciarFuncionarios', compact('funcionarios', 'funcionariosPage'));
    }

    public function create()
    {
        return view('inserirFuncionario');
    }

    public function store(Request $request)
    {

        // validação de usuário
        $dataUsuario = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:5'
        ]);
        $dataUsuario['role'] = 3;
        $dataUsuario['status'] = 'ativado';
        $dataUsuario['senha'] = bcrypt($dataUsuario['senha']);

        $usuarios = Usuario::all();
        foreach ($usuarios as $user) {
            if ($user->email === $dataUsuario['email']) {
                return redirect()->route('gerenciar_funcionarios.create')->with('error', 'O email fornecido já está em uso.');
            }
        }
        $usuario = Usuario::create($dataUsuario);

        // validação de departamento
        $dataDepartamento = $request->validate([
            'departamento_nome' => 'required|max:50',
            'cargo' => 'required|max:50',
            'salario_base' => 'required|max:50000'
        ]);
        $departamento = Departamento::create($dataDepartamento);

        // validação de endereço
        $dataEndereco = $request->validate([
            'rua' => 'required|max:50',
            'numero' => 'required|max:5',
            'cep' => 'required|max:10',
            'complemento' => 'required|max:50',
            'cidade' => 'required|max:50',
            'bairro' => 'required|max:50',
            'estado' => 'required|max:50',
            'pais' => 'required|max:50'
        ]);
        $dataEndereco['status'] = 'ativado';
        $endereco = Endereco::create($dataEndereco);

        // validação de funcionário
        $dataFuncionario = $request->validate([
            'nome_funcionario' => 'required|max:50',
            'registro_geral' => 'required|max:15',
            'cpf' => 'required|max:14',
            'telefone' => 'required|max:15',
            'numero_dependentes' => 'required|max:4',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $dataFuncionario['status'] = 'ativado';
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

        return redirect()->route('gerenciar_funcionarios.index')->with('success', 'Cadastro de dados realizado com sucesso!');
    }

    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('editarFuncionario', ['funcionario' => $funcionario]);
    }

    public function update(Request $request, $id)
    {
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
        $endereco = Endereco::findOrFail($id);
        $endereco->update($dataEndereco);
        $dataDepartamento = $request->validate([
            'departamento_nome' => 'required|max:50',
            'cargo' => 'required|max:50',
            'salario_base' => 'required|max:50000'
        ]);
        $departamento = Departamento::findOrFail($id);
        $departamento->update($dataDepartamento);
        $funcionario = Funcionario::where('id_usuario', $id)->first();
        if ($request->foto == null) {
            $dataFuncionario = $request->validate([
                'nome_funcionario' => 'required|max:50',
                'registro_geral' => 'required|max:15',
                'cpf' => 'required|max:14',
                'telefone' => 'required|max:15',
                'numero_dependentes' => 'required|max:2'
            ]);
        } else {
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
            $funcionario->update([
                'nome_funcionario' => $dataFuncionario['nome_funcionario'],
                'registro_geral' => $dataFuncionario['registro_geral'],
                'cpf' => $dataFuncionario['cpf'],
                'telefone' => $dataFuncionario['telefone'],
                'numero_dependentes' => $dataFuncionario['numero_dependentes'],
                'foto' => $dataFuncionario['foto'],
            ], [
                'required' => 'O campo :attribute é obrigatório.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
                'image' => 'O arquivo deve ser uma imagem.',
                'mimes' => 'O arquivo deve estar nos formatos: :values',
                'foto.max' => 'A imagem deve ter no máximo :max KB.'
            ]);
        }
        return redirect()->route('gerenciar_funcionarios.index')->with('success', 'Edição de dados realizada com sucesso!');
    }

    public function destroy($id)
    {
        $usuarios = Usuario::findOrFail($id);
        $dataUsuarios['status'] = 'desativado';
        $usuarios->update($dataUsuarios);

        $funcionarios = Funcionario::findOrFail($id);
        $dataFuncionarios['status'] = 'desativado';
        $funcionarios->update($dataFuncionarios);

        $endereco = Endereco::findOrFail($id);
        $dataEndereco['status'] = 'desativado';
        $endereco->update($dataEndereco);

        return redirect()->route('gerenciar_funcionarios.index')->with('success', 'Funcionário desativado com sucesso!');
    }

    public function consultaFuncionario(Request $request)
    {
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
        return view('gerenciarFuncionarios', compact('funcionarios', 'funcionariosPage', 'departamentos'));
    }
}
