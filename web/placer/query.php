<?php 
session_start();
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

if ($_POST['type'] == 'staff') {
  try 
  {
    $section= array();
    //$section_query = $db->query('SELECT id FROM instruments WHERE instrument_desc = \''.$_POST['section'].'\'');
    $section_query = $db->query('SELECT id FROM instruments WHERE instrument_desc = \''.$_POST['section'].'\'');
    $section_id = 0;
    foreach($section_query as $row) {
        $section_id = $row['id'];
    }
    foreach ($db->query('SELECT first_name, last_name FROM users') as $row)
    {
      array_push($section,$row['first_name'].'_'.$row['last_name']);
    }
    $json_section = json_encode($section);
    echo $json_section;
  }
  catch(Exceptionn $e) 
  {
    echo $e->getMessage();
  }
}
else if ($_POST['type'] == 'login') {
  $user = $_POST['username'];
  $pw = $_POST['password'];
  $role = $_POST['role'];
  //SELECT u.first_name,u.last_name,i.instrument_desc,r.role_desc FROM users u INNER JOIN instruments i ON (u.instrument_id = i.id) INNER JOIN roles r ON (u.role_id = r.id) WHERE u.username = 'sean_w' AND u.user_password = 'password123';
  $query = 'SELECT u.first_name,u.last_name,i.instrument_desc,r.role_desc FROM users u INNER JOIN instruments i ON (u.instrument_id = i.id) INNER JOIN roles r ON (u.role_id = r.id) WHERE u.username = \''.$user.'\' AND u.user_password = \''.$pw.'\' AND r.role_desc = \''.$role.'\'';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $count = $stmt->rowCount();
  $_SESSION['results'] = $results;
  $arr = array();
  if ($count == 1) {
    $_SESSION['name'] = $results['first_name'].' '.$results['last_name'];
    $_SESSION['section'] = $results['instrument_desc'];
    $_SESSION['role'] = $results['role_desc'];
    $_SESSION['logged_in'] = true;
    $arr['success'] = true;
  }
  else {
    $arr['success'] = false;
  }
  $json = json_encode($arr);
  echo $json;
}
else {
  echo "type not found";
}
/*foreach ($db->query('SELECT username, user_password FROM users') as $row)
{
  $db_obj->name = $row['username'];
  $db_obj->password = $row['user_password'];
}

$my_json = json_encode($db_obj);
echo $my_json;*/







?>