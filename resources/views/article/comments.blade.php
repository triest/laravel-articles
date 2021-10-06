<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">

            <div class="coment-bottom bg-white p-2 px-4">



                @include('article.comment_form',['article_id'=>$article_id])

                @foreach($comments as $comment)
                    <div class="commented-section mt-2">
                        <div class="d-flex flex-row align-items-center commented-user">
                            <h5 class="mr-2">@isset($comment->user->name){{$comment->user->name}}@endisset</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{$comment->created_at}}</span>
                        </div>
                        <div class="comment-text-sm"><span>{{$comment->text}}</span>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/article/comment.js') }}" defer></script>
@endsection