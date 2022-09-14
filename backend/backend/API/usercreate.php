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

  $post->name = $data->name;
  $post->username = $data->username;
  $post->email = $data->email;
  $post->password = $data->password;


  if($post->create()) {
    echo '<script language="javascript">';
    echo 'alert(User Registered Successfuly)';  //not showing an alert box.
    echo '</script>';
    exit;
  } else {
    echo '<script language="javascript">';
    echo 'alert(User Registration Failed)';  //not showing an alert box.
    echo '</script>';
    exit;
  }