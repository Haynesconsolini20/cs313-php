$(document).ready(function(){
    $('#submit_qry').click(function(){
        $.ajax({
            type : "POST",
            url : "query.php",
            success : function(data){
                var results = JSON.parse(data);
                alert(restults.name);
            }
        })
     });
    });