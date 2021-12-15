@extends('plantilla')

@section('titulo', 'Listado de posts')
@section('contenido')
    <h1>Listado de posts</h1>

    @forelse ($posts as $post)
        <div>
            <h1>{{$post->title}}</h1>
            {{-- <p>{{$post->user->login}}</p> --}}
            <div><a href='{{url("/posts/$post->id")}}'>Ver detalles</a></div>
            <form action='{{ url("/posts/$post->id") }}' method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Eliminar">
            </form>
        </div>
    @empty
        <p>No hay posts</p>
    @endforelse
@endsection
