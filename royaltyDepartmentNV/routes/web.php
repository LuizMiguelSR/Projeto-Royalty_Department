<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolhaPontoController;
use App\Http\Controllers\HoleriteController;
use App\Http\Controllers\GerenciarHoleriteController;
use App\Http\Controllers\FuncionarioPontoController;
use App\Http\Controllers\GerenciarFuncionarioController;
use App\Http\Controllers\GerenciarFolhaController;

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

Route::get('/esqueci-minha-senha', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/esqueci-minha-senha', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');

Route::get('/home', function () {
    if (!Auth::check()) {
        return redirect('/sair');
    }
    return view('home');
})->name('home');

Route::get('/sair', function () {
    Session::flush();
    Auth::logout();
    Session::flash('sucess', 'Sessão finalizada com sucesso.');
    return redirect('/login');
})->name('sair');

Route::middleware(['auth'])->group(function () {
    // Rotas que precisam de autenticação
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    /**
     * Rota responsável pela consulta do holerite do funcionário
     */
    Route::get('/holerite', [HoleriteController::class, 'consulta'])->name('holerite_consulta');
    Route::get('/holerite/{id}', [HoleriteController::class, 'consultaId'])->name('holerite_consulta_id');

    /**
     * Rotas responsáveis por listar e registrar a folha de ponto
     */
    Route::resource('funcionarios', FuncionarioPontoController::class);
    Route::get('/folha_ponto', [FuncionarioPontoController::class, 'index'])->name('folha_ponto_consulta');

    /**
     * Rotas responsáveis por listar, consultar, cadastrar, editar e excluir funcionários
     */
    Route::resource('gerenciar_funcionarios', GerenciarFuncionarioController::class);
    Route::put('gerenciar_funcionarios/{id}/ativar', [GerenciarFuncionarioController::class, 'ativar'])->name('gerenciar_funcionarios.ativar');
    Route::put('gerenciar_funcionarios/{id}/desativar', [GerenciarFuncionarioController::class, 'desativar'])->name('gerenciar_funcionarios.desativar');
    Route::get('/gerenciar_funcionario/consulta', [GerenciarFuncionarioController::class, 'consultaFuncionario'])->name('gerenciar_funcionario.consulta');

    /**
     * Rotas responsáveis por listar, consultar, cadastrar, editar e excluir folha de pagamento
     */
    Route::resource('gerenciar_folha', GerenciarFolhaController::class);
    Route::get('/gerenciar_folha/consulta', [GerenciarFolhaController::class, 'consultarFolha'])->name('gerenciar_folha_consulta');

    /**
     * Rotas responsáveis por listar, consultar e cadastrar Holerites
     */
    Route::resource('gerenciar_holerites', GerenciarHoleriteController::class);
    Route::get('/gerenciar_holerite/consulta', [GerenciarHoleriteController::class, 'consultaHoleriteFuncionario'])->name('gerenciar_holerite.consulta');
});

Route::fallback(function() {
    return view('errors.erro');
})->name('error');
