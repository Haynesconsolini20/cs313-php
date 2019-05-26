$(document).ready(function(){
    $('#query').on('change',function(){
        var section = this.value;
        $.post( "query", { type: "staff", section: section })
            .done(function( data ) {
                alert( "Data Loaded: " + data );
        });
     });
    });