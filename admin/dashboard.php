
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

    mysqli_query($condnection, $sql);
}
?>
  <script language="javascript">
		function ConfirmDelete()
		{
			return confirm("Are you sure to delete this data?") ;	
		}
	
	</script>

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
	


	<table border="0" width="100%" heigh="800px" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			
			
			
			 <div id="page-heading"><h1>Website Statics</h1></div>
		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>					
					<th class="table-header-repeat line-left"><a href="">Downlaod Stats</a></th>
					<th class="table-header-repeat line-left"><a href="">Liked Stats</a></th>
					<th class="table-header-options line-left"><a href="">Views Stats</a></th>
					<th class="table-header-options line-left"><a href="">Comment Stats</a></th>
				</tr>
				<tr>
				
					<td>
					<?php
	   	  			$file1="SELECT SUM(download_count) as TotalDownload FROM tbl_file";
	   	  			$result1=mysqli_query($connection,$file1);
	   	  			$row=mysqli_fetch_assoc($result1);
	   	  			$file2="SELECT MAX(download_count) AS HighestDownload FROM tbl_file";
	   	  			$result2=mysqli_query($connection,$file2);
	   	  			$row1=mysqli_fetch_assoc($result2);
	   	  			?>
	   	  			<span >Total Downloads : <?php echo $row['TotalDownload']; ?> </span><br>
	   	  			<span >Highest Downloads : <?php echo $row1['HighestDownload']; ?> </span><br>
					</td>
					<td>
					<?php
	   	  			$like="SELECT count(*) as Totallike FROM tbl_like";
	   	  			$likeresult=mysqli_query($connection,$like);
	   	  			$likerow=mysqli_fetch_assoc($likeresult);
	   	  			$like1="SELECT COUNT(file_id) as 'higestlike' FROM tbl_like GROUP BY file_id ASC limit 1";
	   	  			$likeresult1=mysqli_query($connection,$like1);
	   	  			$likerow1=mysqli_fetch_assoc($likeresult1);
	   	  			?>
	   	  			<span >Total Likes : <?php echo $likerow['Totallike']; ?> </span><br>
	   	  			<span >Highets Likes :<?php echo $likerow1['higestlike']; ?> </span><br>
					</td>
		
					<td>
					<?php
	   	  			$view="SELECT SUM(view_count) as Totalview FROM tbl_file";
	   	  			$viewresult=mysqli_query($connection,$view);
	   	  			$viewrow=mysqli_fetch_assoc($viewresult);
	   	  			$view1="SELECT MAX(view_count) AS Highestview FROM tbl_file";
	   	  			$viewresult1=mysqli_query($connection,$view1);
	   	  			$viewrow1=mysqli_fetch_assoc($viewresult1);
	   	  			?>
	   	  			<span >Total Views : <?php echo $viewrow['Totalview']; ?> </span><br>
	   	  			<span >Highest Views: <?php echo $viewrow1['Highestview']; ?> </span><br>
					</td>	
					<td>
					<?php
	   	  			$comment="SELECT count(*) as Totalcomment FROM tbl_comment";
	   	  			$commentresult=mysqli_query($connection,$comment);
	   	  			$commentrow=mysqli_fetch_assoc($commentresult);
	   	  			$comment1="SELECT COUNT(file_id) as 'higestcomment' FROM tbl_comment GROUP BY file_id ASC limit 1";
	   	  			$commentresult1=mysqli_query($connection,$comment1);
	   	  			$commentrow1=mysqli_fetch_assoc($commentresult1);
	   	  			?>
	   	  			<span >Total comments : <?php echo $commentrow['Totalcomment']; ?> </span><br>
	   	  			<span >Highets comments :<?php echo $commentrow1['higestcomment']; ?> </span><br>
					</td>				
				</tr>
				</table>

		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>					
						<th class="table-header-repeat line-left"><a href="">Categories Stats</a></th>
							<th class="table-header-repeat line-left"><a href="">Files Stats</a></th>
								<th class="table-header-repeat line-left"><a href="">News Stats</a></th>
									<th class="table-header-repeat line-left"><a href="">User Stats</a></th>
				</tr>		
				    <td>
					<?php
	   	  			$cat="SELECT count(*) as Totalcat FROM tbl_category";
	   	  			$catresult=mysqli_query($connection,$cat);
	   	  			$catrow=mysqli_fetch_assoc($catresult);
	   	  			$cat1="SELECT count(*) as inactivecat FROM tbl_category where status='inactive'";
	   	  			$catresult1=mysqli_query($connection,$cat1);
	   	  			$catrow1=mysqli_fetch_assoc($catresult1);
	   	  			?>
	   	  			<span >Total Category : <?php echo $catrow['Totalcat']; ?> </span><br>
	   	  			<span >Inactive Category :<?php echo $catrow1['inactivecat']; ?> </span><br>
					</td>

					<td>
					<?php
	   	  			$file="SELECT count(*) as Totalfile FROM tbl_file";
	   	  			$fileresult=mysqli_query($connection,$file);
	   	  			$filerow=mysqli_fetch_assoc($fileresult);
	   	  			$file1="SELECT count(*) as inactivefile FROM tbl_file where status='inactive'";
	   	  			$fileresult1=mysqli_query($connection,$file1);
	   	  			$filerow1=mysqli_fetch_assoc($fileresult1);
	   	  			?>
	   	  			<span >Total files : <?php echo $filerow['Totalfile']; ?> </span><br>
	   	  			<span >Inactive files :<?php echo $filerow1['inactivefile']; ?> </span><br>
					</td>

				
					<td>
					<?php
	   	  			$news="SELECT count(*) as Totalnews FROM tbl_news";
	   	  			$newsresult=mysqli_query($connection,$news);
	   	  			$newsrow=mysqli_fetch_assoc($newsresult);
	   	  			$news1="SELECT count(*) as inactivenews FROM tbl_news where status='inactive'";
	   	  			$newsresult1=mysqli_query($connection,$news1);
	   	  			$newsrow1=mysqli_fetch_assoc($newsresult1);
	   	  			?>
	   	  			<span >Total News : <?php echo $newsrow['Totalnews']; ?> </span><br>
	   	  			<span >Inactive News :<?php echo $newsrow1['inactivenews']; ?> </span><br>
					</td>
						<td>
					<?php
	   	  			$user="SELECT count(*) as Totaluser FROM tbl_user";
	   	  			$userresult=mysqli_query($connection,$user);
	   	  			$userrow=mysqli_fetch_assoc($userresult);
	   	  			$user1="SELECT count(*) as inactiveuser FROM tbl_user where status='inactive'";
	   	  			$userresult1=mysqli_query($connection,$user1);
	   	  			$userrow1=mysqli_fetch_assoc($userresult1);
	   	  			?>
	   	  			<span >Total Users : <?php echo $userrow['Totaluser']; ?> </span><br>
	   	  			<span >Inactive Users :<?php echo $userrow1['inactiveuser']; ?> </span><br>
					</td>
			
				</table>



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
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

<div class="clear"></div><br>
<br><br><br>
 <div ><h1>Recent Upload</h1></div>


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
				;
					$file="select * from tbl_file ORDER BY upload_date limit 5";
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