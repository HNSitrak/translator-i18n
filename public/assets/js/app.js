$(document).ready(function() {
    $('#loginBtn').on('click', function() {
        $('#loginPopup').fadeIn();
    });

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        $('#loginPopup').fadeOut();
    });
});
