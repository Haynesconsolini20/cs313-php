<?php 
    include("header.php");
?>
    <div class="content">
<?php 
session_start();
if ($_SESSION['logged_in'] == true) {
    echo '<h1>Logged in</h1>';
}
else {
echo        
        '<h1>Parents</h1>
        <p>Members</p>
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <button id="submit_qry">Submit</button>';
}
?>
</div>