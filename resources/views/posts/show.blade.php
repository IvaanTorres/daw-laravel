@extends('plantilla')

@section('titulo', 'Ficha post')
@section('contenido')
    <h1>Ficha del post: {{$post->id}}</h1>

    <div>
        <h2>{{$post->title}}</h2>
        <p>{{$post->body}}</p>
        <p>{{$post->created_at}}</p>
        <p>{{$post->user->login}}</p>
        <hr>
        @forelse ($comments as $comment)
            <div>
                <h3>{{$comment->body}}</h3>
                <p>{{$comment->user->login}}</p>
            </div>
        @empty
            <p>No hay comentarios</p>
        @endforelse
    </div>
@endsection
