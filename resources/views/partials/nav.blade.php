<div class="c-navbar">
    <span class="c-navbar__logo">Blog</span>
    <ul class="c-navbar__list">
        <li class="c-navbar__item"><a class="c-navbar__link {{setActivo('inicio')}}" href="{{url('/')}}">Página de inicio</a></li>
        <li class="c-navbar__item"><a class="c-navbar__link {{setActivo('posts.index')}}" href="{{url('/posts')}}">Listado de posts</a></li>
        @if (auth()->check())
            <li class="c-navbar__item"><a class="c-navbar__link {{setActivo('posts.create')}}" href="{{url('/posts/crear')}}">Crear post</a></li>
            <li class="c-navbar__item"><a class="c-navbar__link {{setActivo('posts.create')}}" href="{{url('/logout')}}">Logout</a></li>
        @endif
        @if(auth()->guest())
            <li class="c-navbar__item"><a class="c-navbar__link {{setActivo('posts.create')}}" href="{{url('/login')}}">Login</a></li>
        @endif
    </ul>
</div>
