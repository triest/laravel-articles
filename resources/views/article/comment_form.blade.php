<form action="{{route('comments.store')}}" method="post" id="comment_form">
    Оставить комментарий
    <input type="hidden" name="article_id" value="{{$article_id}}">

    <input type="text" name="subject" placeholder="Тема сообщения"> <br>
    <textarea name="text" placeholder="Сообщение"></textarea>
    <button type="submit" class="btn btn-primary" type="button">Отправить</button>
</form>

<div class="alert alert-success" role="alert" id="success" style="display: none">Ваше сообщение успешно отправленно
</div>

