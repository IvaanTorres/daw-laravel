<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    {{-- ADD CSS TO BLADE --}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >

    <style>
        *{
            font-family: 'Sora', sans-serif;
        }
    </style>
</head>
<body>
    {{-- NAV --}}
    @include('partials.nav')
    <div class="g--text-align-right g--padding-s">{{fechaActual('d/m/Y')}}</div>

    @yield('contenido')
</body>
</html>
