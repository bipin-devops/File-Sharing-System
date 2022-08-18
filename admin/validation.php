<?php
//including connection
include ("../database/connection.php");

//extracting data from the form	
$username=$_POST['username']; 
$password=$_POST['password'];

//mysqli_real_escape_string() function 
//escapes special characters in a string for use in an SQL statement.
$username = mysql_real_escape_string($username);
$password = MD5(($password));

//selecting a particular data from tbl_admin table	
$sql="select * from tbl_admin where username='$username' and password='$password'";
//echo $sql;
$result = mysqli_query($connection,$sql);
$count = mysqli_num_rows($result);
$u = mysqli_fetch_assoc($result);
//die();
//if the query runs that is if a admin username and password is matched
// then the admin is logged in and redirected to dashboard page 
//else redirected to admin login page again
if ($count==1){
$_SESSION['user_id'] = 	$u['id'];
$_SESSION['myusername']=$username;
header("location:dashboard.php");
}else{
header("location:admin_login.php");
}

?>