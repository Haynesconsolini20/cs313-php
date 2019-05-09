<?php
    session_start();
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<script src="scripts/viewCart.js"></script>
<div class="content">
    <h1>Cart Contents</h1>
    <?php
        foreach((array)$_SESSION['item'] as $idx=>$item) {
            echo "<p id=".$idx.">".str_replace("_"," ",$_SESSION['item'][$idx]).": $".$_SESSION['price'][$idx];
            echo "&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"remove_btn custom_btn\" id=".$idx.">Remove item </span></p>";
        }
     
    ?>
    <br><br>
    <div>
        <div class="custom_btn"><a href="browseItems.php">Return to browsing</a></div>
        <div class="custom_btn"><a href="checkout.php">Proceed to checkout</a></div>
    </div>
  </div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>