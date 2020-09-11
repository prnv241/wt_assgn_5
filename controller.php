<?php 

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
require 'database.php';
require 'connection.php';

$con = new Connection();
$reg = new Registrations($con->connect());
$req = $_GET['req'] ?? null;

if($req) {

  switch($req) {
    case 'reg_list': 
      echo $reg->getRegList();
      break;
      
    default: 
      echo json_encode(["Invalid Resquest!"]);
      break;
  }

} else {
  
  echo $reg->addReg($_POST['name'], $_POST['email'], $_POST['seats'], $_POST['reason']);    
}

?>