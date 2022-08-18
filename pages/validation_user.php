<?php
include ("../database/connection.php");
$username=$_POST['username'];
$password=$_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="select * from tbl_user where username='$username' and password=MD5('$password')";

$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result);
$u = mysqli_fetch_assoc($result);
if ($count==1){
$_SESSION['userid'] = 	$u['id'];
$_SESSION['username']=$username;
//echo $_SESSION['username'];
//die();
header("location:index.php");
}else{
header("location:register.php");
}

?>