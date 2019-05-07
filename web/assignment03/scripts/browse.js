$(document).ready(function(){
    var count = parseInt($("#cartCount").html());

    // jQuery methods go here...
    $(".btn_gallery_item").click(function() {
        var price = $(this).attr("data-price");
        var item = $(this).attr("data-item");
        $.post("backend.php", {"price": price, "item":item});
        count = count + 1;
        $("#cartCount").html(count);
    })
  
  });
  
  