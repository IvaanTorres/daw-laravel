<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /* function __construct(){
        $this->middleware('auth', ['only' => ['destroy']]);
        $this->middleware('roles:admin', ['only' => ['create']]);
        $this->middleware(['auth', 'roles:1']);
    } */

    public function showForm(){
        return view("login");
    }

    public function login(Request $request){
        $credenciales = $request->only('login', 'password'); //! Comprueba los campos "name" de los inputs
        if (Auth::attempt($credenciales)){
            return redirect()->intended(route('inicio'));
        } else {
            $error = 'Usuario incorrecto';
            return view('login', compact('error'));
        }
    }

    public function logout(){
        Auth::logout();
        return view("login");
    }


}
