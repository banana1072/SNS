$(function() {
    $('.login_user_update').click(function() {
        $('#login_user_update').fadeIn();
    });
    $('.other_user_update').click(function() {
        $(this).next().fadeIn();
    });

});
