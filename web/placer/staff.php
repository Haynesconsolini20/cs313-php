<?php 
    include("header.php");
?>
    <div class="content">
    <script src="src/staff.js"></script>
<?php 
if ($_SESSION['logged_in'] == false) { 
    echo       
    '<h1>Staff Login</h1>
    <p>Please enter your login information below: </p>
    Username: <input type="text" id="username"><br>
    Password: <input type="text" id="password"><br>
    <button id="login">Submit</button>';
}
else if ($_SESSION['role'] == 'Staff') {
    echo 
        '<h1>Find your members</h1>
        <p>Choose your section below, and all currently enrolled students in that section will be listed.</p>
        <select id="query" name="section">
            <option value="Snare">Snares</option>
            <option value="Tenor">Tenors</option>
            <option value="Bass">Basses</option>
        </select>
        <div id="section_list"></div>';
}
else {
    echo '<h1>You do not have permission to access this page</h1>';
}

?>
</div>