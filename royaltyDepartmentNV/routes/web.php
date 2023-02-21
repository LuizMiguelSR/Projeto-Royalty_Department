<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolhaPontoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HoleriteController;
use App\Http\Controllers\FuncionarioPontoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

/*Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    $user = \App\Models\User::findByEmailAndPassword($email, $password);

    if ($user) {
        // Autenticado com sucesso
        return redirect()->intended('/dashboard');
    }

    // Credenciais inválidas
    return back()->withErrors([
        'email' => 'As credenciais informadas não são válidas.',
    ]);
})->name('login');*/

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/home', function () {
    if (!Auth::check()) {
        return redirect('/sair');
    }
    return view('home');
})->name('home');

Route::get('/sair', function () {
    Session::flush();
    Auth::logout();
    return redirect('/login');
})->name('sair');

Route::middleware(['auth'])->group(function () {
    // Rotas que precisam de autenticação
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/holerite', [HoleriteController::class, 'consulta'])->name('holerite_consulta');

    Route::get('/folha_ponto', [FolhaPontoController::class, 'consultaPonto'])->name('folha_ponto_consulta');

    Route::post('/funcionario_ponto', [FuncionarioPontoController::class, 'registraPonto'])->name('funcionario_registra_ponto');
    Route::get('/funcionario_ponto', [FuncionarioPontoController::class, 'index'])->name('funcionario_ponto');

    Route::get('/gerenciar_funcionario', [FuncionarioPontoController::class, 'index'])->name('gerenciar_funcionario');

});