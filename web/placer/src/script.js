$(document).ready(function(){
    $('#submit').click(function(){
        $.ajax({
            type : "POST",
            url : "query.php",
            success : function(data){
                alert(data);
            }
        })
     });
    });