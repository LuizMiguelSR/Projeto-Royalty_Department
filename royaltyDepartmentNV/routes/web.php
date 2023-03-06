<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolhaPontoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HoleriteController;
use App\Http\Controllers\FuncionarioPontoController;
use App\Http\Controllers\GerenciarFuncionarioController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CadastrarController;

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

    Route::get('/gerenciar_funcionario', [GerenciarFuncionarioController::class, 'index'])->name('gerenciar_funcionario');
    Route::get('/gerenciar_funcionario/consulta', [GerenciarFuncionarioController::class, 'consultaFuncionario'])->name('gerenciar_funcionario.consulta');
    Route::post('/gerenciar_funcionario', [GerenciarFuncionarioController::class, 'filtrar'])->name('gerenciar_funcionario.filtrar');

    Route::get('/cadastrar_funcionario', [CadastrarController::class, 'cadastrarFuncionario'])->name('cadastrar_funcionario');
    Route::post('/cadastrar', [CadastrarController::class, 'store'])->name('cadastrar');
});
