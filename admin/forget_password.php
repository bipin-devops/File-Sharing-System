<?php
include ("../database/connection.php");

if (isset($_SESSION['myusername'])) {
  header('location:dashboard.php');
}



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Login Page</title>
<link rel="stylesheet" href="../css/admin_screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="../js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="../js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="../js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="../images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	
			   <?php
    if(isset($_POST["email"]))
    {
      $email=$_POST['email'];
      $sql="select * from tbl_admin where email='$email'";
      $result=mysqli_query($connection, $sql);
      $num=mysqli_num_rows($result);
      if($num>0)
      {
        $random=rand(99999,999999);
        $sql="update tbl_admin set password=MD5('$random') where email='$email'";
        $r=mysqli_query($connection,$sql);
         $message="Password Has Been Reset, Your New Password is $random";
        
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    ?>
	<!--  start login-inner -->
	<div id="login-inner">
	<form name="frm" action='<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
		<h2 style="margin-left:25%;">Reset Password</h2>
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email</th>
			<td><input type="text" name="email" class="login-inp" /></td>
		</tr>
		
		
		<tr>
			<th></th>
			<td><input type="submit" value="login" class="submit-login"  /></td>
		</tr>
		</table>
		</form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a style="margin-left:80%;" href="admin_login.php">Back To Login</a>
 </div>
 <!--  end loginbox -->



 
	
</div>
<!-- End: login-holder -->
</body>
</html>