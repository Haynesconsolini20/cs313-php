$(document).ready(function(){
    $('#query').on('change',function(){
        var section = this.value;
        $.post( "query.php", { type: "staff", section: section })
            .done(function( data ) {
                var parsed = jQuery.parseJSON(data);
                alert(parsed);
        });
     });
    });