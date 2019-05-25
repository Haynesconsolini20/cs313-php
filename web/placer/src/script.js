$(document).ready(function(){
    $('#submit_qry').click(function(){
        $.ajax({
            type : "POST",
            url : "query.php",
            success : function(data){
                alert(data);
            }
        })
     });
    });