$(document).ready(function(){
    $("#submit").on("click", function(){
        var username = $("#username").val();
        var password = $("#password").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var role = $("#role").val();
        $.post("query.php",{'type': 'register', 'username': username, 'password': password, 'role':role, 'first_name': first_name, 'last_name': last_name})
            .done(function(){
                location.reload();
        });

            
    })



});