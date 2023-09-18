<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "notes";

$connection = mysqli_connect($server, $username, $password, $database);
if(!$connection){
  echo"<h1>Failed to connect to the database ".mysqli_connect_error().". Please retry!!</h1>";
  die;
}
$result = false;

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $link = $_POST['link'];

  $insert = "INSERT INTO `notes1`( `title`, `description`, `link`) VALUES ('$title', '$desc', '$link')";

  $status = mysqli_query($connection, $insert);
  if($status){
    $result = true;
    header('location: http://localhost/curd_notesapp/index.php', true, 307);
  }
  else{
    echo"insertion not successful";
  }
}
?>