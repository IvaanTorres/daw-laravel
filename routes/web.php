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

//! Path root
Route::get('/', function () {
    $name = 'Iván';
    //* Ways to render a view
    //return view('home')->with('nombre', $name);
    //return view('home')->with(['nombre' => $name]);
    //return view('home', ['nombre' => $name]);
    return view('home', compact('name')); //* It must have the same value (local & view variable)
});
//! Path with params
Route::get('saludo/{nombre}', function($nombre) {
    return "Hola, " . $nombre;
});
//! Path with optional params
Route::get('despedirse/{nombre?}', function($nombre = 'invitado') {
    return "Adios, " . $nombre;
})->where('nombre', '[A-Za-z]+'); //* If it doesn't match the param with the Regex, it shows a 404 error.
//! Path with a name reference
Route::get('contacto', function() {
    return "Página de contacto";
})->name('contact-path'); //* <a href="{{ route('ruta_contacto') }}">Contacto</a> --- It's not necessary an echo

/* IMPORTANT: YOU CAN CONCAT SEVERAL FUNCTIONS */

//* How to render a view when you don't have much logic.
Route::view('/about', 'about', ['name' => 'Nacho']);
