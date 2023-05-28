<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Funcionario;
use PHPMailer\PHPMailer\PHPMailer;

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

    public function redefineIndex()
    {
        return view('redefinir');
    }

    public function redefine(Request $request)
    {
        $email = Usuario::where('email', $request->recuperar)->first();
        if ($email) {
            $idHash = password_hash($email->id, PASSWORD_DEFAULT);
            $usuario = Usuario::findOrFail($email->id);
            $usuario->update([
                'recuperar' => $idHash,
            ]);
            // Configurações do servidor de e-mail
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->Port = env('MAIL_PORT');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');

            // Configurações do e-mail
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($email->email, 'Royalty Department');

            $mail->isHTML(true);
            $mail->Subject = 'Royalty Department - Redefinir de Senha';
            $mail->Body = "Anote sua chave de recuperação: $idHash";
            $mail->AltBody = 'Anote sua chave chave de recuperação: '.$idHash;

            if($mail->send()) {
                return redirect()->route('redefinir_senha.index')->with('sucess', 'Sua chave de recuperação foi enviada ao e-mail informado.');
            } else {
                return redirect()->route('redefinir_senha')->with('error', 'E-mail de recuperação não enviado revise as informações e tente novamente.');
            }
        } else {
            return redirect()->route('redefinir_senha')->with('error', 'Este usuário não consta em nossa base de dados.');
        }
    }

    public function chaveIndex()
    {
        return view('resetSenha');
    }

    public function chave(Request $request)
    {
        $chave = Usuario::where('recuperar', $request->chave)->first();
        if ($chave) {
            $id = $chave->id;
            return view('novaSenha', compact('id'));
        } else {
            return redirect()->route('redefinir_senha.index')->with('error', 'Chave incorreta');
        }
    }

    public function redefineNovaSenha(Request $request)
    {
        $sucesso = Usuario::where('id', $request->id)->first();
        if ($sucesso) {
            $idHash = password_hash($request->novaSenha, PASSWORD_DEFAULT);
            $usuario = Usuario::findOrFail($request->id);
            $usuario->update([
                'senha' => $idHash,
                'recuperar' => null,
            ]);
            return redirect()->route('login')->with('sucess', 'Senha redefinida com sucesso');
        } else {
            return redirect()->route('login')->with('error', 'Alguma etapa do processo falhou tente novamente.');
        }
    }
}
