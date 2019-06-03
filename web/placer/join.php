<?php 
    include('header.php');
?>
<script src="src/join.js"></script>
<div class="content">
<?php 
if ($_SESSION['registered'] == true) {
    echo '<h1>Please navigate to the appropriate page to use the website features. If you just created an account, 
            log in at the appropriate page and please be patient
            while a staff member verifies your account and finalizes your registration.';
}
else if ($_SESSION['logged_in'] == false) {
    echo '
    <h1>Sign up for an account</h1>
    Username: <input type="text" id="username"><br>
    Password: <input type="password" id="password"><br>
    First Name: <input type="text" id="first_name"><br>
    Last Name: <input type="text" id="last_name"><br>
    I am a: <select id="role">
                <option value="Member">Member</option>
                <option value="Parent">Parent</option>
                <option value="Staff">Instructor</option>
            </select><br>
    <button id="submit" class="button">Submit info</button>';
}
?>
</div>
<?php    include('footer.php'); ?>

   