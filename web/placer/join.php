<?php 
    include('header.php');
    print_r($_SESSION);
?>
<script src="src/join.js"></script>
<div class="content">
<?php 
if ($_SESSION['logged_in'] == false) {
    echo '
    <h1>Sign up for an account</h1>
    Username: <input type="text" id="username"><br>
    Password: <input type="text" id="password"><br>
    First Name: <input type="text" id="first_name"><br>
    Last Name: <input type="text" id="last_name"><br>
    I am a: <select id="role">
                <option value="Member">Member</option>
                <option value="Parent">Parent</option>
                <option value="Staff">Instructor</option>
            </select>
    <button id="submit">Submit info</button>';
}
else if ($_SESSION['logged_in'] == true) {
    echo '<h1>Please navigate to the appropriate page to use the website features. If you just created an account, please be patient
            while a staff member verifies your account and finalizes your registration.';
}
?>
</div>
<?php    include('footer.php'); ?>

   