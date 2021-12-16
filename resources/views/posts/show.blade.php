@extends('plantilla')

@section('titulo', 'Ficha post')
@section('contenido')
    <div class="g--margin-horizontal-m">
        <h1 class="c-title">Ficha del post: {{$post->id}}</h1>

        <div class="c-post">
            <h2 class="c-post__title">{{$post->title}}</h2>
            <p class="c-post__body">{{$post->body}}</p>
            <p class="c-post__createdAt">Created: {{$post->created_at}}</p>
            <p class="c-post__user">User: {{$post->user->login}}</p>

            <a class="c-link c-link--alternative" href='{{route("posts.edit", $post->id)}}'>Update</a>
            <form class="g--display-inline-block" action="{{route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input class="c-link c-link--danger" type="submit" value="Delete">
            </form>
            {{-- <form action="{{route('posts.edit', $post->id)}}" method="get">
                @csrf
                <input class="c-button" type="submit" value="Update post">
            </form> --}}
        </div>
        <div>
            <h2 class="c-title g--font-size-xl g--margin-bottom-m">Comments</h2>
            @forelse ($comments as $comment)
                <div class="c-comment">
                    <h3 class="c-comment__body">{{$comment->body}}</h3>
                    <p class="c-comment__user">{{$comment->user->login}}</p>
                </div>
            @empty
                <p>No hay comentarios</p>
            @endforelse
        </div>
    </div>
@endsection
