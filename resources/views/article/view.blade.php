@extends('layouts.app')

@section('content')


    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..."></a>
    <div class="card-body">
        <div class="small text-muted">
            @foreach($article->tag as $tagItem)
                <button type="button" class="btn btn-dark btn-circle btn-xl"> {{$tagItem->title}}</button>
            @endforeach
        </div>
        <h2 class="card-title">{{$article->title}}</h2>
        <p class="card-text">{!! $article->description !!}</p>

    </div>

    @include('article.comments',['comments'=>$article->comment,'article_id'=>$article->id])


@endsection
