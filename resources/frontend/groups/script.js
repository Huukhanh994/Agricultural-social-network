$('.acceptRequestFriend').click(function (e) {
    e.preventDefault();
    var class_key = $(this).parent().parent().attr("class").substr(0, 1);
    console.log(class_key);
    $.ajax({
        type: 'POST',
        url: "/relationship/ajaxSendRequestFriend",
        data: { receiver_id_request: receiver_id_request},
        success: function (data) {
            if (data.success_add_friend) {
                $('.' + class_key + 'inline-items').hide();
                alert('Send request friend successfully!');
            }
        }
    });
})