
<?php
include("../includes/checkout-session.php");
include '../includes/admin_header.php';
include("../database/connection.php");

if(isset($_POST['fileId'])) { 
	$fileID = $_POST['fileId'];

    $file="select * from tbl_file where id=$fileID";
    $result=mysqli_query($connection, $file);
    $row= mysqli_fetch_assoc($result);
   
    if($row['status'] == 'active') {
    	$sql = "UPDATE tbl_file SET status='inactive' WHERE id='$fileID'";
    } else {
    	$sql = "UPDATE tbl_file SET status='active' WHERE id='$fileID'";
    }

    mysqli_query($connection, $sql);
}
?>
  <script language="javascript">
		function ConfirmDelete()
		{
			return confirm("Are you sure to delete this data?") ;	
		}
	
	</script>
 

 

<!-- start content -->
<div id="content">

	<!--  start content-table-inner -->
	<div id="content-table-inner">
	


	<table border="0" width="100%" heigh="800px" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			 <div id="page-heading"><h1>My Profile</h1></div>

			 			<div id="info">
				<?php
				$userid = $_SESSION['user_id'];
					$user="select * from tbl_admin where id='$userid'";
					$result=mysqli_query($connection, $user);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
				?>
				 <img style="float:right;" src="../images/<?=$row['images']?>" alt="" width="300" height="300">
			<p>Username  : <?=$row['username']?></p>
			<p>Fist Name : <?=$row['fname']?></p>
			<p>Last Name : <?=$row['lname']?></p>
			<p>Address   : <?=$row['address']?></p>
			<p>phone     : <?=$row['phone']?></p>
			<p>Email     : <?=$row['email']?></p>
			<p>Join Date :  <?=$row['join_date']?></p><br>
			<?php echo"<a href='edit_admin.php?id=$row[id]' > Edit Profile</a>";?>
			
			</div>
		<?php
				}
			}
			?>


			<div class="clear"></div>
		</div>
		
	

	<!--  start related-activities -->
	<td>
	<div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="../images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->
		

		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner1">
				<div class="scroll">
			<?php
					$user="select * from tbl_contact";
					$result=mysqli_query($connection, $user);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
			?>
		
		<b style="margin-left:5%;"><?=$row['email']?></b>&nbsp;&nbsp;&nbsp;<i>on <?=$row['date']?></i>
		<p style="margin-top:3%;margin-left:5%"><?=$row['message']?></p>
		
		<hr style=" margin-top: 2em;margin-bottom: 1em;">
		<?php
				}
			}
		?>
		</div>



			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
	<!-- end related-activities -->

</td>
</tr>
<tr>
<td><img src="../images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->


 <div id="page-heading"><h1>My Uploaded Files</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="../images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="../images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
		</table>
	
		 
				<!--  start product-table ..................................................................................... -->
				
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">ID</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Category</a></th>
					<th class="table-header-repeat line-left"><a href="">File Name</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Description</a></th>
					<th class="table-header-repeat line-left"><a href="">Upload Date</a></th>
					<th class="table-header-repeat line-left"><a href="">Images</a></th>
					<th class="table-header-repeat line-left"><a href="">Files</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>

					<?php
					$userid = $_SESSION['user_id'];
					$file="select * from tbl_file where admin_id='$userid'";
					$result=mysqli_query($connection, $file);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
						$cat="select * from tbl_category where id=$row[cat_id]";
						$catergoy = mysqli_query($connection, $cat);
						$catName=mysqli_fetch_assoc($catergoy);
				?>
					<td><?=$row['id']?></td>
					<td><?=$catName['title']?></td>
					<td><?=$row['file_name']?></td>
					<td> 
						<?php 
                  $string=$row['description'];
                  if (strlen($string) > 250) {
                        $trimstring = substr($string, 0, 250);
                        } else {
                        $trimstring = $string;
                               }
                  echo $trimstring;
                 
                  ?>
              		</td>
					<td><?=$row['upload_date']?></td>
					<td><img src="../images/<?=$row['images']?>" height=50 width=50></td>
					<td><?php echo "<a href='../upload_file/$row[files]' download> $row[file_name]</a>";?></td>
					<td>
						<?php
							if($row['status'] == 'active') {
								$status = 'Active';
								$class = "success";
							} else {
								$status = 'Inactive';
								$class = "danger";
							}
						?>
						<form method="POST" action="<?=$_SERVER["PHP_SELF"]?>">
							<input type="hidden" name="fileId" value="<?=$row['id']?>">
						<button type="submit" class="btn btn-<?=$class?>"><?=$status?></button>
						</form>
					</td>
					<td >
					<?php echo"<a href='edit_file.php?id=$row[id]' title='Edit' class='icon-1 info-tooltip'> </a>";?>
					<?php echo"<a href='delete_file.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip' onclick='return ConfirmDelete()'> </a>";?>
					
					
					</td>
				</tr>
				
				<?php
				}

			
			}
		

		?>
				</table>


	</div>

    
<?php
include '../includes/admin_footer.php';
?>