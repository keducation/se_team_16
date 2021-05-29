<?php
$host='localhost';
$user = 'root';
$pw = 'hH1LrLJ426fZ';
$dbName = 'user_db';
$mysqli = new mysqli($host, $user, $pw, $dbName);

function back_caution($msg) {
  $str = "<script>";
  $str .= "alert('{$msg}');";
  $str .= "history.back();";
  $str .= "</script>";
  echo("$str");
  exit;
}

$user_name=$_POST['uname'];
$id=$_POST['id'];
$password=$_POST['psw'];
$password2=$_POST['check-psw'];
$email=$_POST['email'];
$phone_number=$_POST['phone'];
$birthDay=$_POST['bday'];
$address=$_POST['addr'];

if($password===$password2) {
  $password=md5($_POST['psw']);
  $sql = "insert into user (user_name, user_id, user_pwd, user_email, phone_number, birthday, address)";
  $sql = $sql. "values('$user_name','$id','$password','$email','$phone_number','$birthday','$address')";

  if($mysqli->query($sql)){
   back_caution('Success to Signup');
  }else{
   back_caution('Fail to Signup');
  }
} else {
  back_caution('The password is different');
}
?>
