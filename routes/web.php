<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/menu', function () {
        return view('menu');
    })->name('menu');

    Route::get('/menu_admin', function () {
        return view('menu_admin');
    })->name('menu_admin');
});

Route::middleware(['auth.custom'])->group(function () {
    Route::get('/menu', [ProdutoController::class, 'index'])->name('menu');
    Route::get('/menu_admin', function () { return view('menu_admin'); })->name('menu_admin');
});

Route::post('/produtos/baixa/{id}', [ProdutoController::class, 'darBaixa'])->name('produtos.baixa');
Route::get('/menu', [ProdutoController::class, 'index'])->name('menu');