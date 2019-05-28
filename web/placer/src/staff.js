$(document).ready(function(){
    $('#query').on('change',function(){
        var section = this.value;
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
    });