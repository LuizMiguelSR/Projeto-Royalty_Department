<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolhaPontoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HoleriteController;

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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
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
})->name('login');

Route::get('/', function () {
    return redirect('/login');
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

    Route::post('/holerite', [HoleriteController::class, 'holerite'])->name('holerite');
    Route::get('/holerite', [HoleriteController::class, 'consulta'])->name('holerite.consulta');

    Route::post('/folhaPonto', [FolhaPontoController::class, 'folhaPonto'])->name('folhaPonto');
    Route::get('/folhaPonto', [FolhaPontoController::class, 'consultaPonto'])->name('folhaPonto.consulta');
});
