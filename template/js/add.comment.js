$(document).ready(function(){

$('#main-contact-form').on('submit', function(event) {
    event.preventDefault();
    var form_data = $(this).serialize();
    var id_item = $('#itemID').val();
    $.ajax({
        url: "components/add_comment.php",
        method: "POST",
        data: form_data,
        dataType:"JSON",
        success: function(data) {
            if(data.error != '') {
                $('#main-contact-form')[0].reset();
                $('#comment_message').html(data.error);
                $('#comment_id').val('0');
                load_comment();
            }
        }
    })
});

load_comment();

function load_comment() {
    var id_item = $('#itemID').val();
    $.ajax({
        url: "components/fetch_comment.php",
        method: "POST",
        data: {itemID: id_item},
        success:function(data) {
            $('#display_comment').html(data);
        }
    })
}

$(document).on('click', '.reply', function() {
    var comment_id = $(this).attr("id");
    $('#comment_id').val(comment_id);
    $('#comment_email').focus();
});

});