
<?php
include("../includes/checkout-session.php");
include ("../includes/admin_header.php");
include("../database/connection.php");

if(isset($_POST['fileId'])) { 
	$fileID = $_POST['fileId'];

    $file="select * from tbl_user where id=$fileID";
    $result=mysqli_query($connection, $file);
    $row= mysqli_fetch_assoc($result);
   
    if($row['status'] == 'active') {
    	$sql = "UPDATE tbl_user SET status='inactive' WHERE id='$fileID'";
    } else {
    	$sql = "UPDATE tbl_user SET status='active' WHERE id='$fileID'";
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


 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>User Deatils</h1></div>


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
	
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	
		 
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Last Name</a>	</th>
					<th class="table-header-repeat line-left"><a href="">First Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">username</a></th>
					<th class="table-header-repeat line-left"><a href="">contact</a></th>
					<th class="table-header-repeat line-left"><a href="">address</a></th>
					<th class="table-header-repeat line-left"><a href="">Images</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>

					<?php
					$user="select * from tbl_user";
					$result=mysqli_query($connection, $user);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
					?>

					<tr>
					<td><?=$row['fname']?></td>
					<td><?=$row['lname']?></td>
					<td><a href=""><?=$row['email']?></a></td>
					<td><?=$row['username']?></td>
					<td><?=$row['contact']?></td>
					<td><?=$row['address']?></td>
					<td> <img src="../images/<?=$row['images']?>" height=50 width=50></td>
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
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<?php echo"<a href='delete_user.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip' onclick='return ConfirmDelete()'> </a>";?>
					

					</td>
				</tr>
				
				<?php
				}
			}

		?>
				</table>
				
			</div>
			<!--  end content-table  -->
		
		<?php
include '../includes/admin_footer.php';
?>