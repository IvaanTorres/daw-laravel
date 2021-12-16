@extends('plantilla')

@section('titulo', 'Create post')
@section('contenido')
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <label for="title">Title: </label><br>
        <input type="text" name="title" id="title" value="{{old('title')}}"><br>
        @if ($errors->has('title'))
            <div style="color: red">
                {{ $errors->first('title') }}
            </div>
        @endif
        <label for="body">Post content: </label><br>
        <textarea name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea><br>
        @if ($errors->has('body'))
            <div style="color: red">
                {{ $errors->first('body') }}
            </div>
        @endif
        <label for="user">User: </label>
        <input type="text" name="user" id="user" value="{{old('user')}}"><br>
        @if ($errors->has('user'))
            <div style="color: red">
                {{ $errors->first('user') }}
            </div>
        @endif
        <input type="submit" value="Send">
    </form>
@endsection
