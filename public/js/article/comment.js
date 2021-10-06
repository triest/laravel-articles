
$( "#comment_form").submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type : 'POST',
        url : '/api/comments',
        data : $('#comment_form').serialize(),
        success: function (data) {
            $( "#comment_form").css("display","none")
            $( "#success").css('display','block')

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("error")
            if (XMLHttpRequest.status === 422) {
                let errors = XMLHttpRequest.responseText;
                errors = JSON.parse(errors)
                printErrorMsg(errors);
            }
        }
    })
});


function printErrorMsg(msg) {
    let message = ""
    var arr = jQuery.makeArray(msg);

    if (arr[0] !== undefined && arr[0].errors !== undefined) {
        $.each(arr[0].errors, function (key, value) {
            message += value;
            message += "\n"
        });
    }

    if (message !== "") {
        alert(message);
    }
}
