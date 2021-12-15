@extends('plantilla')

@section('titulo', 'Ficha post')
@section('contenido')
    <h1>Ficha del post: {{$post->id}}</h1>

    <div>
        <h2>{{$post->titulo}}</h2>
        <p>{{$post->body}}</p>
        <p>{{$post->created_at}}</p>
    </div>
@endsection
