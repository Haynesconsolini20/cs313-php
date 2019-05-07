<?php
    session_start();
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<div class="content">
    <h1>Purchase confirmation</h1>
    <p>Thank you for your purchases, the details of your order are below:</p>
    <?php 
        echo "Address: ".$_POST['address']." ".$_POST['city']. ", ".$_POST['state']." ".$_POST['zip']."<br/>";
        echo "<br/>Items purchased: <br/>";
        $total = 0;
        foreach($_SESSION['item'] as $idx=>$item) {
            echo "<p id=".$idx.">".str_replace("_"," ",$_SESSION['item'][$idx]).": $".$_SESSION['price'][$idx]."</p>";
            $total += intval($_SESSION['price'][$idx]);
        }
        echo "<br/>Total: $".$total."<br/>";

    ?>
  </div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>