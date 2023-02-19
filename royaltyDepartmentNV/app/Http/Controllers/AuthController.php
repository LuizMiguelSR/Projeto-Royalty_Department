<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

            // add funcionario name
            $user = Auth::user();
            $funcionario = $user->funcionario;

            return redirect()->intended('/home');
        }

        // add flash message
        Session::flash('error', 'Email ou senha inválidos.');

        return redirect()->route('login');
    }
}
