<?php
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<div class="content">
<div class="gallery">
    <?php 
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
          echo "<button class=btn_gallery_item btn_gallery__item--".$idx.">Add to cart</button>";
          echo "</figure>";
        }
        
      ?>
    </div>
</div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>