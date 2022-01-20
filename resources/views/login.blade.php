@extends('plantilla')

@section('titulo', 'Listado de libros')
@section('contenido')
    <div>
        <form class="c-form" action="{{route('login')}}" method="POST">
            @csrf
            <label class="c-form__label" for="login">Login</label>
            <input class="c-form__input" type="text" name="login" id="login">
            <br>
            <label class="c-form__label" for="password">Password</label>
            <input class="c-form__input" type="password" name="password" id="password">
            <br>
            <input class="c-button" type="submit" value="Send">
        </form>
    </div>
@endsection
