$(function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        
$('#ajax').click(function() {
    $.ajax({
        url: "/message",
        data: {
            name: $("#message-name").val()
        },
        type: "POST",
        dataType: "json",
        success: function(data,statusTxt,xhr) {
            $('#ajax-append').append("<tr><td class='table-text'><a href=messages/"+data.id+"><div>"+data.message+"</div></a></td><td></td><td></td></tr>");
        },
        error: function() {
            console.log("fail");
        },
        complete: function() {
        } 
    });
});
 
});
