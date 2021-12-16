@extends('plantilla')

@section('titulo', 'Create post')
@section('contenido')
    <form class="c-form" action="{{route('posts.store')}}" method="POST">
        @csrf
        <label class="c-form__label" for="title">Title: </label><br>
        <input class="c-form__input" type="text" name="title" id="title" value="{{old('title')}}"><br>
        @if ($errors->has('title'))
            <div class="c-form__error">
                {{ $errors->first('title') }}
            </div>
        @endif
        <label class="c-form__label" for="body">Post content: </label><br>
        <textarea class="c-form__textarea" name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea><br>
        @if ($errors->has('body'))
            <div class="c-form__error">
                {{ $errors->first('body') }}
            </div>
        @endif
        <label class="c-form__label" for="user">User: </label>
        <input class="c-form__input" type="text" name="user" id="user" value="{{old('user')}}"><br>
        @if ($errors->has('user'))
            <div class="c-form__error">
                {{ $errors->first('user') }}
            </div>
        @endif
        <input class="c-button" type="submit" value="Send">
    </form>
@endsection
