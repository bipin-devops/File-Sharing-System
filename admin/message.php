
<?php
include("../includes/checkout-session.php");
include ("../includes/admin_header.php");
include("../database/connection.php");

?>

 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Message</h1></div>


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
	
		 
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					
					<th class="table-header-repeat line-left"><a href="">ID</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Phone</a></th>
					<th class="table-header-repeat line-left"><a href="">Email Address</a></th>
					<th class="table-header-repeat line-left"><a href="">Date</a></th>
					<th class="table-header-repeat line-left"><a href="">Message</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>

					<?php
					$user="select * from tbl_contact";
					$result=mysqli_query($connection, $user);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
					?>

				<tr>
					
					<td width=4%><?=$row['id']?></td>
					<td width=10%><?=$row['name']?></td>
					<td width=10%><?=$row['phone']?></td>
					<td width=16%><?=$row['email']?></td>
					<td width=10%><?=$row['date']?></td>
					<td width=40%><?=$row['message']?></td>
					<td width=10%><?php echo"<a href='delete_message.php?id=$row[id]' title='delete' >Delete </a>";?></td>
				</tr>
				
				<?php
				}
			}

		?>
				</table>
				
			</div>
			<!--  end content-table  -->
		
		
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
		</table>


    
<?php
include '../includes/admin_footer.php';
?>