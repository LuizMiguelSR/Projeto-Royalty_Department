<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\Funcionario;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate user
        $user = User::findByEmailAndPassword($request->email, $request->password);

        if ($user) {
            Auth::login($user);

            // add flash message
            Session::flash('success', 'Login realizado com sucesso.');

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
        }

        // add flash message
        Session::flash('error', 'Email ou senha inválidos.');

        return redirect()->route('login');
    }

    public function showLinkRequestForm()
    {
        return view('redefinir');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = $this->broker()->reset(
            $credentials, function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
                    ? redirect($this->redirectPath())
                    : back()->withErrors(['email' => [trans($response)]]);
    }
}
