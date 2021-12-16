@extends('plantilla')

@section('titulo', 'Edit the post')
@section('contenido')
    <form action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title: </label><br>
        <input type="text" name="title" id="title" value="{{$post->title}}"><br> {{-- PREGUNTAR COMO PONER EL old('title') AQUI --}}
        @if ($errors->has('title'))
            <div style="color: red">
                {{ $errors->first('title') }}
            </div>
        @endif
        <label for="body">Post content: </label><br>
        <textarea name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea><br>
        @if ($errors->has('body'))
            <div style="color: red">
                {{ $errors->first('body') }}
            </div>
        @endif
        <label for="user">User: </label>
        <input type="text" name="user" id="user" value="{{$post->user->login}}"><br>
        @if ($errors->has('user'))
            <div style="color: red">
                {{ $errors->first('user') }}
            </div>
        @endif
        <input type="submit" value="Send">
    </form>
@endsection
