<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::get('/', function() {
    return view('inicio');
})->name('inicio');

Route::resource('/posts', PostController::class)
->only(['index', 'show', 'create', 'edit', 'destroy']);

Route::get('/libros/nuevoPrueba', [PostController::class, 'nuevoPrueba']);
Route::get('/libros/editarPrueba/{id}', [PostController::class, 'editarPrueba']);
