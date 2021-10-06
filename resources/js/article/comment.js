
$( "#comment_form").submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type : 'POST',
        url : 'api/comments',
        data : $('#comment_form').serialize()
    })
});
