@extends('layouts.app')

@section('content')
    @foreach($articles as $article)

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                @include('article.article_short_view',['article'=>$article])
            </div>
        </div>
    @endforeach
@endsection
