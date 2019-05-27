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
try 
{
    
    $section= array();
    $section_id = $db->query('SELECT id FROM instruments WHERE instrument_desc == Snare')['id'];
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