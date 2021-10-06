<div class="d-flex flex-row add-comment-section mt-4 mb-4">
    <form action="{{route('comments.store')}}" method="post" id="comment_form">
        <input type="hidden" name="article_id" value="{{$article_id}}">
        <textarea name="text"></textarea>
        <button type="submit" class="btn btn-primary" type="button">Comment</button>
    </form>
</div>
