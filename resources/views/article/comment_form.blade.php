<form action="{{route('comments.store')}}" method="post" id="comment_form">
    <div class="form-group">
        <input type="hidden" name="article_id" value="{{$article_id}}">
        <input type="text" name="subject" class="form-control"
               placeholder="тема сообщения">
    </div>
    <div class="form-group">
        <textarea name="text" placeholder="Сообщение"  cols="84" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-dark">Отправить комментарий</button>
</form>

<div class="alert alert-success" role="alert" id="success" style="display: none">Ваше сообщение успешно отправленно
</div>

