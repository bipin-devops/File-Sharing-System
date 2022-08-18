<?php
session_start();
if(isset($_SESSION['myusername'])) {
	return true;	
} else {
	header("location:../pages/index.php");
}
?>