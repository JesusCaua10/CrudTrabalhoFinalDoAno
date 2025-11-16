<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FolhaDePagaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Funcionários
    Route::resource('funcionarios', FuncionarioController::class);

    // CRUD Cargos
    Route::resource('cargos', CargoController::class);

    // CRUD Departamentos
    Route::resource('departamentos', DepartamentoController::class);

    // CRUD Folha de Pagamento
    Route::resource('folha', FolhaDePagaController::class);
});

require __DIR__.'/auth.php';