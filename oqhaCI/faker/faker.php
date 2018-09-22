<?php 
$table_name=$argv[2];
$sql;
include_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
$table_name=$argv[2]; 





function insertDB($data,$table_name,$sql)
{
    $field="";
    $vfield="";

    foreach ($data as $k => $v) {
        $field.="`".$k."`,";
        $vfield.="'".$v."',";
    }
    $field=substr($field, 0,-1);
    $vfield=substr($vfield, 0,-1);
    $query = "INSERT INTO $table_name($field) VALUES($vfield)";
    echo "\r\n$vfield";
    $stmt = $sql->prepare($query) OR die("Error code :" . $sql->errno . " (not_primary_field)");
    $stmt->bind_param('s', $database);
    $stmt->bind_result($table_name);
    $stmt->execute();
    while ($stmt->fetch()) {
        $fields[] = array('table_name' => $table_name);
    }
    return $fields;
    $stmt->close();
    $sql->close();
}

function truncateDB($table_name,$sql)
{

    $query = "TRUNCATE TABLE $table_name";
    $stmt = $sql->prepare($query) OR die("Error code :" . $sql->errno . " (not_primary_field)");
    $stmt->bind_result($table_name);
    $stmt->execute();
    while ($stmt->fetch()) {
        $fields[] = array('table_name' => $table_name);
    }
    return $fields;
    $stmt->close();
    $sql->close();
}

$subject = file_get_contents('application/config/database.php');
$string = str_replace("defined('BASEPATH') OR exit('No direct script access allowed');", "", $subject);

$con = 'oqhaCI/faker/connection.php';
$create = fopen($con, "w") or die("Change your permision folder for application and harviacode folder to 777");
fwrite($create, $string);
fclose($create);

require $con;

$host = $db['default']['hostname'];
$user = $db['default']['username'];
$password = $db['default']['password'];
$database = $db['default']['database'];

$sql = new mysqli($host, $user, $password, $database);
if ($sql->connect_error)
{
    echo $sql->connect_error . ", please check 'application/config/database.php'.";
    die();
}

unlink($con);



function seed_users($limit,$table_name,$sql,$faker)
{
    echo "seeding $limit data";
    
    for ($i = 0; $i < $limit; $i++) {
       
     require "application/seed/$table_name.php";
     insertDB($data,$table_name,$sql);
 }
}




truncateDB($table_name,$sql);
seed_users(($argv[3]) ?$argv[3] : 25 ,$table_name,$sql,$faker);






?>