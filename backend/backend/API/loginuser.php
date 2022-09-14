<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../DBconfig.php';
  include_once '../Models/user.php';


  $database = new Database();
  $db = $database->connect();


  $post = new Post($db);


  $data = json_decode(file_get_contents("php://input"));


  $post->username = $data->username;
  $post->password = $data->password;

 
  $result = $post->login();
  $count = $result->rowCount();
  if($count>0) {
 
  echo '<script language="javascript">';
  echo 'alert(User Logged in)';  //not showing an alert box.
  echo '</script>';
  exit;
  } else {
   
  echo '<script language="javascript">';
  echo 'alert(Invalid Password Or Username)';  //not showing an alert box.
  echo '</script>';
  exit;
  }