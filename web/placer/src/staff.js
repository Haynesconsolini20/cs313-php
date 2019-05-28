$(document).ready(function(){
    $('#query').on('change',function(){
        var section = this.value;
        if (section == '--Section--') return;
        $.post( "query.php", { type: "staff", section: section })
            .done(function( data ) {
                var parsed = jQuery.parseJSON(data);
                parsed = JSON.stringify(parsed);
                var pattern = /(\"|\[|\])/g;
                parsed = parsed.replace(pattern,"");
                var names = parsed.split(',');
                $('#section_list').html('');
                names.forEach(element => {
                    var name_split = element.split('_');
                    var html = '<p>' + name_split[0] + ' ' + name_split[1] + '</p>';
                    $('#section_list').append(html);
                });
            });
     });
     $("#login").on("click", function(){
        var username = $("#username").val();
        var password = $("#password").val();
        $.post("query.php",{type: 'login', 'username': username, 'password': password, role: 'Staff'})
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