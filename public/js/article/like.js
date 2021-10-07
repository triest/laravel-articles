$( "#new_like").click(function( event ) {

});

function new_like(article_id){

    event.preventDefault();
    let formData = new FormData();
    formData.append('article_id', article_id);

    $.ajax({
        type : 'POST',
        url : '/api/like',
        data : formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data.count!==undefined) {
                document.getElementById('count_like').innerText = data.count;
            }

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
}
