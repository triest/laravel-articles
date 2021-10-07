@extends('layouts.app')

@section('content')
    <main role="main" class="container-fluid">
        <div class="jumbotron">
            <h1>Успех</h1>
            <p class="lead">Для молодых и успешных</p>
        </div>
    </main>
    <div class="container">
        <div class="row">
            @foreach($articles as $article)

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        @include('article.article_short_view',['article'=>$article])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
