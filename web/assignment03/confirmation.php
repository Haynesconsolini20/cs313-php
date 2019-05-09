<?php
    session_start();
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<div class="content">
    <h1>Purchase confirmation</h1>
    <p>Thank you for your purchases, the details of your order are below:</p>
    <?php 
        //Sanitize inputs
        //This is where inputs would be sanitized, if we were interacting with a database. Since we are not,
        //all the good php tools for doing so are useless.
        /*foreach($_POST as $idx=>$var) {
            $_POST[$idx] = mysqli_real_escape_string($var);
        }*/
        echo "Address: ".$_POST['address']." ".$_POST['city']. ", ".$_POST['state']." ".$_POST['zip']."<br/>";
        echo "<br/>Items purchased: <br/>";
        $total = 0;
        foreach($_SESSION['item'] as $idx=>$item) {
            echo "<p id=".$idx.">".str_replace("_"," ",$_SESSION['item'][$idx]).": $".$_SESSION['price'][$idx]."</p>";
            $total += intval($_SESSION['price'][$idx]);
        }
        echo "<br/>Total: $".$total."<br/>";

        //Clear the array of purchased items
        $_SESSION['price'] = array();
        $_SESSION['item'] = array();

    ?>
  </div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>