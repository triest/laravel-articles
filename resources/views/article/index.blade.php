@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        <div class="small text-muted">
            @foreach($tags as $tagItem)
                <a href="{{route('article.tag',['tag'=>$tagItem->slug])}}" type="button" class="btn btn-dark btn-circle btn-xl"> {{$tagItem->title}}</a>
            @endforeach
        </div>
    </div>
    <div class="col-md-9">

        @foreach($articles as $article)

            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..."></a>
            <div class="card-body">
                <div class="small text-muted">January 1, 2021</div>
                <h2 class="card-title"><a class="btn btn-primary"
                                          href="{{route('articles.show',['article'=>$article->slug])}}">{{$article->title}}</a>
                </h2>
                <p class="card-text">{{$article->short_description}}</p>
                {{$article->count_view}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                     viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
                <span onclick="new_like({{$article->id}})" class="count_like">
               <span id="count_like">
                       {{$article->count_like}}
               </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart"
                     viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg>
                </span>
            </div>

        @endforeach
        <p></p>
        <div class="card-body">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/article/like.js') }}" defer></script>
@endsection
