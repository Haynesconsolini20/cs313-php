<?php 
    include("header.php");
?>
    <script src="src/members.js"></script>
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
        Username: <input type="text" id="username"><br>
        Password: <input type="text" id="password"><br>
        <button id="login">Submit</button>';
}
?>
<div id="fail"></div>
</div>