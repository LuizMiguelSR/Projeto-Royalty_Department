<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Funcionario;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:50'
        ]);

        // attempt to authenticate user
        $user = User::findByEmailAndPassword($request->email, $request->password);
        if ($user) {
            Auth::login($user);
            $status = Usuario::where('id', $user->id)->first();
            if ($status->status === 'ativado') {
                // add flash message
                Session::flash('sucess', 'Login realizado com sucesso.');

                // add funcionario nome e foto para session
                $user = Auth::user();
                $funcionario = Funcionario::where('id_usuario', $user->id)->first();
                if ($funcionario) {
                    $nome = $funcionario->nome_funcionario;
                    $caminho_imagem = $funcionario->foto;
                } else {
                    $nome = "";
                    $caminho_imagem = "";
                }
                $request->session()->put('funcionario_nome', $nome);
                $request->session()->put('funcionario_foto', $caminho_imagem);

                return redirect()->intended('/home');
            } else {
                // add flash message
                Session::flash('error', 'O usuário encontra-se com a conta desativada.');

                return redirect()->route('login');
            }
        }

        // add flash message
        Session::flash('error', 'Email ou senha inválidos.');

        return redirect()->route('login');
    }
}
