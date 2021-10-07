<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>{{ $title  ?? "Блог" }}</title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#!">Тредиум</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link  @if(request()->routeIs('home')) active @endif"
                                        href="{{route('home')}}" style="float: right">На главную</a></li>
                <li class="nav-item"><a
                            class="nav-link @if(request()->routeIs('articles.index') || request()->routeIs('articles.show')) active @endif"
                            href="{{route('articles.index')}}">Каталог статей</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page content-->

@yield('content')



<!-- Footer-->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1><b>Тредиум </b></h1>
            <p>©3001-3020. Все права защищены</p>

        </div>
        <div class="col-md-4">
            <p>Блог</p>
            <p>Как перестать прокрастинировать и начать жить</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
@yield('scripts')
<script src="{{ asset('js/article/like.js') }}" defer></script>
</body>
</html>
