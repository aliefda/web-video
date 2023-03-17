// app.js
$(document).ready(function() {
    $('.video-link').click(function(e) {
        e.preventDefault();
        var videoId = $(this).data('id');
        $.ajax({
            url: '/videos/' + videoId + '/player',
            type: 'GET',
            success: function(data) {
                $('#video-player').html(data);
                $('#video-player-iframe').attr('src', '/storage/' + video.video);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});
