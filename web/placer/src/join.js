$(document).ready(function(){
    $("#submit").on("click", function(){
        var username = $("#username").val();
        var password = $("#password").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var role = $("#role").val();
        $.post("query.php",{'type': 'register', 'username': username, 'password': password, 'role':role, 'first_name': first_name, 'last_name': last_name})
            .done(function(data){
                var results = JSON.parse(data);
                if (results.success == true) {
                    //reload page
                    location.reload();
                }
                else {
                    $("#fail").append('<p>Login failed, please try again</p>');
                }

            })
    })



});