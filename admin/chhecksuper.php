<?php
	$id = $_SESSION['user_id'];
	$sql = "select * from tbl_admin where id='$id' and superadmin = 'yes' ";
	$res = mysqli_query($connection,$sql);
	
?>