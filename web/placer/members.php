<?php 
    include("header.php");
?>
    <script src="src/members.js"></script>
    <div class="content">
<?php 
session_start();
print_r($_SESSION);
if ($_SESSION['role'] == 'Member') {
    echo '<h1>Member page</h1>';
    echo '<p>Name: '.$_SESSION['name'].'<br/>';
    echo 'Section: '.$_SESSION['section'].'<br/>';
    echo 'Status: '.$_SESSION['role'].'</p>';
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