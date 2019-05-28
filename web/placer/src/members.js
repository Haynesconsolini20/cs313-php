$(document).ready(function(){
    alert("test");
    $("#login").on("click", function(){
        var username = $("#username").val();
        var password = $("#password").val();
        $.post("query.php",{type: 'login', 'username': username, 'password': password, role: 'Member'})
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