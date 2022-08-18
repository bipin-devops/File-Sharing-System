
<?php
include("../includes/checkout-session.php");
include("../connection.php");
include '../includes/admin_header.php';

?>

 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Search Result</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">

<?php
			$s=$_GET["s"];
			$from=$_GET["catsearch"];

			if($from=="tbl_category")
										{
				//active o inactive
				if(isset($_POST['fileId'])) { 
					$fileID = $_POST['fileId'];

				    $file="select * from tbl_category where id=$fileID";
				    $result=mysqli_query($connection, $file);
				    $row= mysqli_fetch_assoc($result);
				   
				    if($row['status'] == 'active') {
				    	$sql = "UPDATE tbl_category SET status='inactive' WHERE id='$fileID'";
				    } else {
				    	$sql = "UPDATE tbl_category SET status='active' WHERE id='$fileID'";
				    }

				    mysqli_query($connection, $sql);
				} //end active or inactive

				$sqlMenu = " select * from tbl_category where title like '%$s%'  ";
				$result = mysqli_query($connection, $sqlMenu);
				while($row=mysqli_fetch_assoc($result)) {
				?>

					<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		 
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a href="">ID</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Category Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Description</a></th>
					<th class="table-header-repeat line-left"><a href="">Upload Date</a></th>
					<th class="table-header-repeat line-left"><a href="">Images</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>

					<?php
					
					$result=mysqli_query($connection, $sqlMenu);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
					?>

					<tr>
					<td><input  type="checkbox"/></td>
					<td><?=$row['id']?></td>
					<td><?=$row['title']?></td>
					<td><a href=""><?=$row['description']?></a></td>
					<td><?=$row['upload_date']?></td>
					<td><img src="../images/<?=$row['images']?>" height=50 width=50></td>
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
						<form method="POST" action="view_category.php">
							<input type="hidden" name="fileId" value="<?=$row['id']?>">
						<button type="submit" class="btn btn-<?=$class?>"><?=$status?></button>
						</form>

					</td>
					<td class="options-width">
					<?php echo"<a href='edit_category.php?id=$row[id]' title='Edit' class='icon-1 info-tooltip'> </a>";?>
					<?php echo"<a href='delete_category.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip'> </a>";?>
					<a href="" title="Approved" class="icon-3 info-tooltip"></a>
					
					</td>
				</tr>
				
				<?php
				}
			}

		?>
				</table>
				

				<?php
				}
			}

			else if($from=="tbl_admin")
			{
		

				$sqlMenu = " select * from tbl_admin where username like '%$s%' OR fname like '%$s%' OR lname like '%$s%' OR address like '%$s%'";
				$result = mysqli_query($connection, $sqlMenu);
				while($row=mysqli_fetch_assoc($result)) {
				?>

		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
		<tr>
			<th class="table-header-check"><a id="toggle-all" ></a> </th>
			<th class="table-header-repeat line-left"><a href="">Last Name</a>	</th>
			<th class="table-header-repeat line-left"><a href="">First Name</a></th>
			<th class="table-header-repeat line-left"><a href="">Email</a></th>
			<th class="table-header-repeat line-left"><a href="">username</a></th>
			<th class="table-header-repeat line-left"><a href="">phone</a></th>
			<th class="table-header-repeat line-left"><a href="">Address</a></th>
			<th class="table-header-repeat line-left"><a href="">Date</a></th>
			<th class="table-header-repeat line-left"><a href="">Images</a></th>
			<th class="table-header-options line-left"><a href="">Options</a></th>
		</tr>
		<?php

				
				$result=mysqli_query($connection, $sqlMenu);
				while ($row=mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<td><input  type="checkbox"/></td>
			<td><?=$row['fname']?></td>
			<td><?=$row['lname']?></td>
			<td><a href=""><?=$row['email']?></a></td>
			<td><?=$row['username']?></td>
			<td><?=$row['phone']?></td>
			<td><?=$row['address']?></td>
			<td><?=$row['join_date']?></td>
			<td><img src="../images/<?=$row['images']?>" height=50 width=50></td>
			<td class="options-width">
				<?php echo "<a href='edit_admin.php?id=$row[id]' title='Edit' class='icon-1 info-tooltip'></a>";?>
				<?php echo "<a href='delete_admin.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip'> </a>";?>
				<a href="" title="Approved" class="icon-3 info-tooltip"></a>
				
			</td>
		</tr>

		<?php
				}
		?>

	</table>

				<?php
				}
			}
			else if($from=="tbl_user")
			{
			//active o inactive
				if(isset($_POST['fileId'])) { 
					$fileID = $_POST['fileId'];

				    $file="select * from tbl_category where id=$fileID";
				    $result=mysqli_query($connection, $file);
				    $row= mysqli_fetch_assoc($result);
				   
				    if($row['status'] == 'active') {
				    	$sql = "UPDATE tbl_category SET status='inactive' WHERE id='$fileID'";
				    } else {
				    	$sql = "UPDATE tbl_category SET status='active' WHERE id='$fileID'";
				    }

				    mysqli_query($connection, $sql);
				} //end active or inactive

				$sqlMenu = " select * from tbl_user where username like '%$s%' OR fname like '%$s%' OR lname like '%$s%' OR address like '%$s%'  ";
				$result = mysqli_query($connection, $sqlMenu);
				while($row=mysqli_fetch_assoc($result)) {
			?>

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
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
					
					$result=mysqli_query($connection, $sqlMenu);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
					?>

					<tr>
					<td><input  type="checkbox"/></td>
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
						<form method="POST" action="add_user.php">
							<input type="hidden" name="fileId" value="<?=$row['id']?>">
						<button type="submit" class="btn btn-<?=$class?>"><?=$status?></button>
						</form>

					</td>
					<td class="options-width">
					<a href="" title="Edit" class="icon-1 info-tooltip"></a>
					<?php echo"<a href='delete_user.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip'> </a>";?>
					<a href="" title="Approved" class="icon-3 info-tooltip"></a>

					</td>
				</tr>
				
				<?php
				}
			}

		?>
				</table>

				<?php
					}
				}
			
			else if($from=="tbl_file")
			{
				//active o inactive
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
				} //end active or inactive

				$sqlMenu = " select * from tbl_file where file_name like '%$s%' OR description like '%$s%'  ";
				$result = mysqli_query($connection, $sqlMenu);
				while($row=mysqli_fetch_assoc($result)) {
					?>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
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
						$cat="select * from tbl_category where id=$row[cat_id]";
						$catergoy = mysqli_query($connection, $cat);
						$catName=mysqli_fetch_assoc($catergoy);
					?>
					<td><input  type="checkbox"/></td>
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
						<form method="POST" action="view_file.php">
							<input type="hidden" name="fileId" value="<?=$row['id']?>">
						<button type="submit" class="btn btn-<?=$class?>"><?=$status?></button>
						</form>
					</td>
					<td class="options-width">
					<?php echo"<a href='edit_file.php?id=$row[id]' title='Edit' class='icon-1 info-tooltip'> </a>";?>
					<?php echo"<a href='delete_file.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip'> </a>";?>
					<a href="" title="Approved" class="icon-3 info-tooltip"></a>
					
					</td>
				</tr>
		</table>
					<?php
						}
					}
								else{
									echo"No Result Found";
								}
					?>
</table>
			
			
	</div>
	</div>

    
<?php
include '../includes/admin_footer.php';
?>