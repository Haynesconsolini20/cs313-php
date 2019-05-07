<?php
    session_start();
    $all = get_defined_vars();
    echo print_r($all);
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<script src="scripts/viewCart.js"></script>
<div class="content">
    <h1>Page Title</h1>
    <?php
        echo $_SESSION['item'];
        foreach((array)$_SESSION['item'] as $idx=>$item) {
            echo "<p id=".$idx.">".str_replace("_"," ",$_SESSION['item'][$idx]).": $".$_SESSION['price'][$idx];
            echo " <button class=remove_btn id=".$idx.">Remove item </button></p>";
        }
     
    ?>
    <div>
        <a href="browseItems.php">Return to browsing</a>
        <a href="checkout.php">Proceed to checkout</a>
    </div>
  </div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>