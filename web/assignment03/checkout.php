<?php
    session_start();
    $all = get_defined_vars();
    print_r($all);
    include($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
?>
<div class="content">
    <h1>Enter Payment Information</h1>
    <form action="confirmation.php" method="post">
        Address:<br/>
        <input type="text" name="address"><br/>
        City:<br/>
        <input type="text" name="city"><br/>
        State:<br/>
        <input type="text" name="state"><br/>
        Zip code:<br/>
        <input type="text" name="zip"><br/>
        <input type="submit" value="Complete Purchase">
    </form>
    <a href="viewCart.php">Return to cart</a>
  </div>
<?php 
    include($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php");
?>