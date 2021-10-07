@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        <div class="small text-muted">
            @foreach($tags as $tagItem)
                <a href="{{route('article.tag',['tag'=>$tagItem->slug])}}"  type="button" class="btn btn-dark btn-circle btn-xl"> {{$tagItem->title}}</a>
            @endforeach
        </div>
    </div>
    <div class="col-md-9">

        @foreach($articles as $article)
             @include('article.article_short_view',['article'=>$article])
         @endforeach
        <p></p>
        <div class="card-body">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection



