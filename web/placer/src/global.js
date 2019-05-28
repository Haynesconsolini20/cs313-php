$(document).ready(function(){
    $('#logout').on('click', function(){
        $.post('query.php', {type: 'logout'})
            .done(function(){
                location.reload();
            })
    })




});