@extends('plantilla')

@section('titulo', 'Listado de posts')
@section('contenido')
    <h1 class="c-title g--text-align-center">Listado de posts</h1>


    <div class="g--margin-top-l g--margin-left-m">
        @forelse ($posts as $post)
            <div class="c-post">
                <h2 class="c-post__title">{{$post->title}}</h2>
                {{-- <p>{{$post->user->login}}</p> --}}
                <a class="c-link" href='{{url("/posts/$post->id")}}'>Ver detalles</a>
                <a class="c-link c-link--alternative" href='{{route("posts.edit", $post->id)}}'>Update</a>
                <form class=" g--margin-top-m g--margin-bottom-l g--display-inline-block" action='{{ url("/posts/$post->id") }}' method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="c-link c-link--danger" type="submit" value="Eliminar">
                </form>
            </div>
        @empty
            <p>No hay posts</p>
        @endforelse
    </div>
@endsection
