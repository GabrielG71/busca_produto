<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;

// Página inicial (index)
Route::get('/', function () {
    return view('index');
})->name('index');

// Login e logout
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas com middleware
Route::middleware(['auth.custom'])->group(function () {
    
    // Menu normal para usuários (com pesquisa e baixa de produtos)
    Route::get('/menu', [ProdutoController::class, 'index'])->name('menu');
    Route::post('/produtos/baixa/{id}', [ProdutoController::class, 'darBaixa'])->name('produtos.baixa');

    // Menu admin com CRUD completo
    Route::get('/menu_admin', [ProdutoController::class, 'admin'])->name('menu_admin');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
});