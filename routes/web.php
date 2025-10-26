<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FolhaDePagaController;

Route::resource('cargo', CargoController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::resource('folhadepaga', FolhaDePagaController::class);