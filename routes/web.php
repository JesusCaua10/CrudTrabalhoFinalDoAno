<?php

use App\Http\Controllers\CargoController;
use Illuminate\Support\Facades\Route;

Route::resource('cargo', CargoController::class);