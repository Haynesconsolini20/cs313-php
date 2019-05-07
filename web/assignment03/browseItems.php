<?php
    session_start();
    if (!isset($_SESSION['item'])) {
      $_SESSION['item'] = array();
      $_SESSION['price'] = array();
    }
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<script src="scripts/browse.js"></script>
<div class="content">
<div id="cart">
Items in cart: <div id="cartCount"><?php echo count($_SESSION['item']);?></div>
</div>
<a href="viewCart.php">Proceed to checkout</a>
<div class="gallery">
    <?php 
        //function for extracting price from caption
        function extractPrice($caption) {
          $exploded = explode(" ",$caption);
          foreach($exploded as $word) {
            if (strpos($word,'$') !== false) {
              return substr($word,1);
            }
          }
          return '0';
        }
        function extractItem($caption) {
          $exploded = explode(" ",$caption);
          $item = array();
          foreach($exploded as $word) {
            if ($word == "-") {
              break;
            }
            else {
              array_push($item,$word);
            }
          }
          return implode('_',$item);
        }
        // directory to search for images
        $dir = "images/";
        // array to store images
        $image_arr = array();

        // Open a directory, and read its contents
        if (is_dir($dir)){
          if ($dh = opendir($dir)){
            $pattern = '/^cart/';
            while (($file = readdir($dh)) !== false){
              if(preg_match($pattern,$file) == true) {
                array_push($image_arr,$file);
              } 
            }
            closedir($dh);
          }
        }

        //Directory to search for captions
        $dir = "captions/";
        //Array to store captions
        $caption_arr = array();
        // Open a directory, and read its contents
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
              $pattern = '/^cart/';
              while (($file = readdir($dh)) !== false){
                if(preg_match($pattern,$file) == true) {
                  array_push($caption_arr,file_get_contents("captions/".$file));
                } 
              }
              closedir($dh);
            }
          }

        foreach($image_arr as $idx=>$value) {
          echo "<figure class=\"gallery__item gallery__item--".$idx."\">";
          echo "<img src=\"images/".$value."\" class =\"gallery__img\" alt=\"Image ".$idx."\">";
          echo $caption_arr[$idx]."<br />";
          echo "<button class=btn_gallery_item btn_gallery__item--".$idx." data-price=".extractPrice($caption_arr[$idx])." data-item=".extractItem($caption_arr[$idx]).">Add to cart</button>";
          echo "</figure>";
        }
        
      ?>
    </div>
</div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>