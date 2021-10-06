<div class="d-flex flex-row add-comment-section mt-4 mb-4">

    <form action="{{route('comments.store')}}" method="post" id="comment_form">
        <input type="hidden" name="article_id" value="{{$article_id}}">
         Тема сообщения  <br>
        <input type="text" name="subject" >  <br>
        <textarea name="body"></textarea>
        <button type="submit" class="btn btn-primary" type="button">Comment</button>
    </form>

    <div class="alert alert-success" role="alert" id="success" style="display: none">Ваше сообщение успешно отправленно</div>
</div>
