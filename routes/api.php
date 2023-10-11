<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::resource("/categoria", CategoriaController::class );
Route::resource("/produtos", ProdutoController::class);


