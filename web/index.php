<?php include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");?>

<div class="content">
    <h1>Music Education</h1>
    <p>Sam Haynes is available for contract work with your music ensemble. Sam has deep ties to the area, with varied performance and teaching experience. Notable performance roles include holding the assistant and head drum major positions at Bella Vista High School, playing cymbals for Vanguard Winter Percussion, and a host of performances with varied ensembles as a percussionist at BYU-Idaho. Sam also has 4 years of teaching experience under his belt. This includes times with Bella Vista High School, Roseville High School, South Fremont High School, and the BYU-Idaho drumline. Included below are performance photos for the various ensembles in which he has been involved as a staff member, where Sam composed music and led the staff in visual design.</p>
    <div class="gallery">
      <?php 
        // directory to search for images
        $dir = "images/";
        // array to store images
        $image_arr = array();

        // Open a directory, and read its contents
        if (is_dir($dir)){
          if ($dh = opendir($dir)){
            $pattern = '/^grid/';
            while (($file = readdir($dh)) !== false){
              if(preg_match($pattern,$file) == true) {
                array_push($image_arr,$file);
              } 
            }
            closedir($dh);
          }
        }
        foreach($image_arr as $idx=>$value) {
          echo "<figure class=\"gallery__item gallery__item--".$idx."\">";
          echo "<img src=\"images/".$value."\" class =\"gallery__img\" alt=\"Image ".$idx."\">";
          echo "</figure>";
        }
        
      ?>
    </div>
  </div>
  

<?php include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");?>
  
 