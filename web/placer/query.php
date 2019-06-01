<?php 
session_start();
function parentLogin($data) {
  global $db;
  $family_id = $data['id'];
  $_SESSION['family_id'] = $family_id;
  $query = 'SELECT u.first_name,u.last_name,i.instrument_desc,r.role_desc, u.id FROM users u LEFT JOIN instruments i ON (u.instrument_id = i.id) INNER JOIN roles r ON (u.role_id = r.id)  INNER JOIN family f ON (u.id = f.user_id) WHERE f.family_id = \''.$family_id.'\'';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['child_results'] = $results;
  $children_arr = array();
  foreach($results as $child) {
    $child_arr = array();
    $child_arr['name'] = $child['first_name'].' '.$child[0]['last_name'];
    $child_arr['section'] = $child['instrument_desc'];
    $child_arr['role'] = $child['role_desc'];
    array_push($children_arr, $child_arr);
  }
  $_SESSION['children'] = $children_arr;
}
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
    $query = 'SELECT u.first_name, u.last_name FROM users u WHERE instrument_id = \''.$section_id.'\'';
    foreach ($db->query($query) as $row)
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
  $query = 'SELECT u.first_name,u.last_name,i.instrument_desc,r.role_desc, u.id FROM users u LEFT JOIN instruments i ON (u.instrument_id = i.id) INNER JOIN roles r ON (u.role_id = r.id) WHERE u.username = \''.$user.'\' AND u.user_password = \''.$pw.'\'';
  $_SESSION['query'] = $query;
  $stmt = $db->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $count = $stmt->rowCount();
  $_SESSION['results'] = $results;
  $_SESSION['count'] = $count;
  $arr = array();
  if ($count == 1) {
    $_SESSION['name'] = $results[0]['first_name'].' '.$results[0]['last_name'];
    $_SESSION['section'] = $results[0]['instrument_desc'];
    $_SESSION['role'] = $results[0]['role_desc'];
    if ($role == 'Parent') 
      parentLogin($results[0]);
    $_SESSION['logged_in'] = true;
    $arr['success'] = true;
  }
  else {
    $arr['success'] = false;
  }
  $json = json_encode($arr);
  echo $json;
}
else if ($_POST['type'] == 'logout') {
  $_SESSION['logged_in'] = false;
  $_SESSION['role'] = 'none';
}
else if ($_POST['type'] == 'new_user') {
  $query = "INSERT INTO users
  (id,first_name,last_name,role_id,username,user_password)
  VALUES
  (
  nextval(\'users_id_s1\'),\'".
  $_POST['first_name']."\',\'".
  $_POST['last_name']."\',
  (SELECT id FROM roles WHERE role_desc = \'".$_POST['role']."\'),\'".
  $_POST['username']."\',\'".
  $_POST['password']."\'
  )";
  $_SESSION['query'] = $query;
  $stmt = $db->prepare($query);
  $stmt->execute();
  echo 'Success';
}
else {
  echo "type not found";
}







?>