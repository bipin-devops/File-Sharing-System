
<?php
session_start();
include("../includes/checkout-session.php");
include '../includes/admin_header.php';


?>

 
 <div class="clear"></div>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Change Password</h1></div>

<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">

			<?php

	if(isset($_POST['old_password'])) {
		$old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $re_password = $_POST['re_password'];
        $result = mysqli_query($connection, "SELECT password FROM tbl_admin WHERE fname='$_SESSION[myusername]'");    

		$passwod = mysqli_fetch_assoc($result);

		$oldPassword = $passwod['password'];

		if($old_password == $oldPassword && $new_password==$re_password) {
			 mysqli_query($connection, "UPDATE tbl_admin SET password=md5('$new_password') WHERE fname='$_SESSION[myusername]'");	
		
									?>
									<!-- start message-green -->
											<div id="message-green">
											<table border="0" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td class="green-left">Password changed sucessfully. <a href="change_password.php">Change again.</a></td>
												<td class="green-right"><a class="close-green"><img src="../images/table/icon_close_green.gif"   alt="" /></a></td>
											</tr>
											</table>
											</div>
									<!--  end message-green -->	
									<?php	
										} else{ 
									?>
												<!--  start message-red -->
												<div id="message-red">
												<table border="0" width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td class="red-left">Error. <a href="change_password.php">Please try again.</a></td>
													<td class="red-right"><a class="close-red"><img src="../images/table/icon_close_red.gif"   alt="" /></a></td>
												</tr>
												</table>
												</div>
												<!--  end message-red -->
									<?php
										}

								
	}
?>

<form action='<?php $_SERVER["PHP_SELF"];?>' method='post'>
										<!-- start id-form -->
										<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
											
											<tr>
												<th valign="top">Old Password:</th>
												<td><input type="text" name = "old_password" class="inp-form-error" /></td>
											</tr>
											<tr>
												<th valign="top">New Password:</th>
												<td><input type="text" name = "new_password" class="inp-form-error" /></td>
											</tr>
											<tr>
												<th valign="top">Re-Enter Password:</th>
												<td><input type="text" name = "re_password" class="inp-form-error" /></td>
											</tr>
											
											
											
										
											<tr>
												<th>&nbsp;</th>
												<td valign="top">
													<input type="submit" value="" class="form-submit" />
													<input type="reset" value="" class="form-reset"  />
												</td>
												<td></td>
											</tr>
										</table>
									</form>

</table>


			
	</div>
	</div>

    
<?php
include '../includes/admin_footer.php';
?>