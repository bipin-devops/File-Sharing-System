
<?php
include("../includes/checkout-session.php");
include ("../includes/admin_header.php");
include("../database/connection.php");

?>

 <?php
 							
								$id=$_GET['id'];
									$delete="DELETE FROM tbl_category WHERE id='$id'";
									$result1=mysqli_query($connection, $delete);

									$delete1="DELETE * FROM tbl_file WHERE id='$id'";
									$result2=mysqli_query($connection, $delete1);
						
									if(mysqli_num_rows($result1)<1) 
										{ 
									?>
									<!-- start message-green -->
											<div id="message-green">
											<table border="0" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td class="green-left">Category Deleted sucessfully. <a href="view_category.php">Delete Next one.</a></td>
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
													<td class="red-left">Error. <a href="view_category.php">Please try again.</a></td>
													<td class="red-right"><a class="close-red"><img src="../images/table/icon_close_red.gif"   alt="" /></a></td>
												</tr>
												</table>
												</div>
												<!--  end message-red -->
									<?php
										}
									?>
			

    
<?php
include '../includes/admin_footer.php';
?>