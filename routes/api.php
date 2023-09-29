<?php

use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource("/categoria", CategoriaController::class );



