<?php 
    include("header.php");
?>
    <script src="src/parents.js"></script>
    <div class="content">
<?php 
//print_r($_SESSION);
if ($_SESSION['role'] == 'Parent') {
    echo '<h1>Your children:</h1>';
    foreach($_SESSION['children'] as $child) {
        echo '<p>Name: '.$child['name'].'<br/>';
        echo 'Section: '.$child['section'].'<br/>';
        echo 'Status: '.$child['role'].'</p>';
    }
}
else if ($_SESSION['logged_in']) {
    echo '<h1>Please visit the web page appropriate to your role in order to use website features</h1>';
}
else {
echo        
        '<h1>Parents</h1>
        <p>Please enter your login information below:</p>
        Username: <input type="text" id="username"><br>
        Password: <input type="text" id="password"><br>
        <button id="login">Submit</button>';
}
?>
<div id="fail"></div>
</div>
<?php include('footer.php') ?>