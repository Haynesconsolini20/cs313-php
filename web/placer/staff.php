<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="styles/placer_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="src/staff.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="parents.php">Parents</a>
        <a href="members.php">Members</a>
        <a href="index.php"><img id="logo" src="assets/logo.png"></a>
        <a href="staff.php">Staff</a>
        <a href="join.php">Join</a>
    </div>
    <div class="top">
    </div>
    <div class="content">
        <h1>Find your members</h1>
        <p>Choose your section below, and all currently enrolled students in that section will be listed.</p>
        <select id="query" name="section">
            <option value="snare">Snares</option>
            <option value="tenor">Tenors</option>
            <option value="bass">Basses</option>
        </select>
        <div id="section_list"></div>
    </div>