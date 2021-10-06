@extends('layouts.app')

@section('content')

    @foreach($articles as $article)

        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..."></a>
        <div class="card-body">
            <div class="small text-muted">January 1, 2021</div>
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="card-text">{{$article->short_description}}</p>
            <a class="btn btn-primary" href="{{route('articles.show',['article'=>$article->slug])}}">Read more →</a>
        </div>

    @endforeach

@endsection
