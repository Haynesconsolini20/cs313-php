$(document).ready(function(){
    $(".remove_btn").click(function(){
        var id = $(this).attr("id");
        $.post("backend.php",{"remove":true, "idx":id});
        $("p#" + id).html("");
    });
  
  });