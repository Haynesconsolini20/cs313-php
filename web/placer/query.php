<?php 
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
    $section_id = $db->query('SELECT id FROM instruments WHERE instrument_desc == '.$_POST['section'])['id'];
    foreach ($db->query('SELECT first_name, last_name FROM users WHERE instrument_id == '.$section_id) as $row)
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