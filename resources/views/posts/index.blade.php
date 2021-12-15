@extends('plantilla')

@section('titulo', 'Listado de posts')
@section('contenido')
    <h1>Listado de posts</h1>

    @foreach ($posts as $post)
        <div>
            <h1>{{$post->titulo}}</h1>
            <div><a href='{{url("/posts/$post->id")}}'>Ver detalles</a></div>
            <form action='{{ url("/posts/$post->id") }}' method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Eliminar">
            </form>
        </div>
    @endforeach
@endsection
