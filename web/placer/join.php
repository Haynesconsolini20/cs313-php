<?php 
    include('header.php');
?>
<div class="content">
<h1>Sign up for an account</h1>
Username: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
I am a: <select name="role">
            <option value="Student">Student</option>
            <option value="Parent">Parent</option>
            <option value="Staff">Instructor</option>
        </select>
<button id="submit">Submit info</button>
</div>
<?php    include('footer.php'); ?>

   