<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;


Route::get('/', function() {
    return view('inicio');
})->name('inicio');

Route::resource('/posts', PostController::class);

Route::get('/libros/nuevoPrueba', [PostController::class, 'nuevoPrueba']);
Route::get('/libros/editarPrueba/{id}', [PostController::class, 'editarPrueba']);

//! MIRAR
Route::get('/login', [UserController::class, 'showForm'])->name("login");
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
