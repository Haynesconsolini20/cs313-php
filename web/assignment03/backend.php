<?php
    session_start();
    if ($_POST['remove'] == true) {
        unset($_SESSION['price'][$_POST['idx']]);
        unset($_SESSION['item'][$_POST['idx']]);
    }
    else {
        array_push($_SESSION['price'],$_POST['price']);
        array_push($_SESSION['item'],$_POST['item']);
    }

?>