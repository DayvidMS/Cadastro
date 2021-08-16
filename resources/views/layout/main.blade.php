<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    {{--JavaScript--}}
    <script src="/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{--SWAL--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--CSS Bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    {{--Fonte do Google--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{--folha de estilo--}}
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="/img/hdcproduct_logo.svg" alt="HDC Events">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/categoria" class="nav-link">Cadastrar Categoria</a>
                </li>
                <li class="nav-item">
                    <a href="/produtos" class="nav-link">Cadastrar Produtos</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
                <p class="msg">{{session('msg')}}</p>
            @endif
            @yield('content')
        </div>
    </div>
</main>
<footer>
    <p>HDC Produtos &copy; 2021 </p>
</footer>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>
