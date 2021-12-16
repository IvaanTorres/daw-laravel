@extends('plantilla')

@section('titulo', 'Ficha post')
@section('contenido')
    <h1>Ficha del post: {{$post->id}}</h1>

    <div>
        <h2>{{$post->title}}</h2>
        <p>{{$post->body}}</p>
        <p>{{$post->created_at}}</p>
        <p>{{$post->user->login}}</p>
        <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete post">
        </form>
        <form action="{{route('posts.edit', $post->id)}}" method="get">
            @csrf
            <input type="submit" value="Update post">
        </form>
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
