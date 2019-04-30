<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="sidebar">
    <a href="index.php"><img src="images/snare.jpg" id="profile" /></a>
    <a href="index.php">Home</a>
    <a href="assignments.php">Assignments</a>
  </div>
<div class="content">
    <h1>Page Title</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <div class="footer">
      Last edited:
      <?php
        putenv("TZ=America/Los_Angeles");
        echo date("m/d/y", filemtime($_SERVER["SCRIPT_FILENAME"]));
      ?>
    </div>
</body>
  
 