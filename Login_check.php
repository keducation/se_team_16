<?php
$host='localhost';
$user = 'root';
$pw = 'hH1LrLJ426fZ';
$dbName = 'user_db';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$user_id = mysqli_real_escape_string($conn, $_POST['ID-login']);
$user_password = mysqli_real_escape_string($conn, $_POST['psw-login']);
$sql = "select user_pwd from user where user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if($row != null){
  $get_password = $row['user_pwd'];
}

if (password_verify($user_password, $get_password)) {
  echo 'true';
}else{
  echo 'false';
}
?>
