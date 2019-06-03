<?php 
    include("header.php");
?>
    <div class="content">
    <script src="src/staff.js"></script>
<?php 
//print_r($_SESSION);
if ($_SESSION['logged_in'] == false) { 
    echo       
    '<h1>Staff Login</h1>
    <p>Please enter your login information below: </p>
    Username: <input type="text" id="username"><br>
    Password: <input type="password" id="password"><br>
    <button id="login" class="button">Submit info</button>
    <div id="fail"></div>';
}
else if ($_SESSION['role'] == 'Staff') {
    echo 
        '<h1>Find your members</h1>
        <p>Choose your section below, and all currently enrolled students in that section will be listed.</p>
        <select id="query" name="section">
            <option value="none">--Section--</option>
            <option value="Snare">Snares</option>
            <option value="Tenor">Tenors</option>
            <option value="Bass">Basses</option>
        </select>
        <div id="section_list"></div>';
    echo 
        '<h1>Assign sections</h1>
        <p>This is a list of accounts without section assignments, you may assign them a section here.</p>';
    try
    {
        $dbUrl = getenv('DATABASE_URL');
    
        $dbOpts = parse_url($dbUrl);
    
        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');
    
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    $students = array();
    $section_query = $db->query("SELECT id, first_name, last_name FROM users WHERE role_id = (SELECT id FROM roles WHERE role_desc = 'Member') AND instrument_id is null");
    echo "<table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Section</th>
            </tr>";
    foreach($section_query as $row) {
        echo "<tr>
                <td>".$row['first_name']."</td>
                <td>".$row['last_name']."</td>
                <select class=change_section id=".$row['id'].">
                    <option value=none>-----</option>
                    <option value=Snare>Snare</option>
                    <option value=Tenor>Tenor</option>
                    <option value=Bass>Bass</option>
                </select>";
    }

}
else {
    echo '<h1>You do not have permission to access this page</h1>';
}

?>
</div>
<?php include('footer.php') ?>