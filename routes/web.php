<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return view('inicio');
})->name('inicio');

Route::get('/posts', fn() => view('posts/listado'))->name('post_listado');
Route::get('/posts/{id}', function($id){
    return view('posts/ficha', compact('id')); //'id', not $id
})->where('id', '[0-9]+')->name('post_ficha');
