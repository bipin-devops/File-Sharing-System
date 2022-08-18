
<?php
include("../includes/checkout-session.php");
include '../includes/admin_header.php';
include("../database/connection.php");
?>

 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Add News</h1></div>


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
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Add News details</a></div>
			<div class="step-dark-right">&nbsp;</div>
		
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->

	<?php
	$news_title="";
	$news_description="";
	$error="";
	$nameerror="";
	$imgerror1="";
	$imgerror2="";

			if(isset($_POST['title'])){
				$news_title=$_POST['title'];
				$news_description=$_POST['description'];
				$date=date("Y-m-d");
				
				

				  if ($news_title=="" || $news_description=="" ) {
				    $error.="Please fill all the required fields. <br> ";	
				   } else {

				    
					//validating image type 
				    	  if($_FILES["images"]["type"] == "image/png" || $_FILES["images"]["type"] == "image/jpg" || $_FILES["images"]["type"] == "image/jpeg" )
							     	 {
										$imgerror1.= "";
									 }
									 else{
									 	$imgerror1.="JPEG, PNG, JPG 2MB max per image";
									 }
					//validating images size
					   		if($_FILES["images"]["size"]>2097157 )
									{
											$imgerror2.="Images size must be 2MB ";
									}

				   }
		
if($error==""  && $imgerror1=="" && $imgerror2=="" ) {
					

		$images="";
	
		if(is_uploaded_file($_FILES["images"]['tmp_name'])) {
		move_uploaded_file($_FILES["images"]['tmp_name'],"../images/". $_FILES["images"]['name']);
		$images = $_FILES["images"]['name'];
				}
		$admin = $_SESSION['user_id'];
		$sql="Insert into tbl_news(`user_id`,`news_title`,`news_description`,`upload_date`,`news_image`) 
						values('$admin','$news_title','$news_description','$date','$images')";

						
									
			$result=mysqli_query($connection,$sql);

			if($result)

			{ 
									?>
									<!-- start message-green -->
											<div id="message-green">
											<table border="0" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td class="green-left">News  Added sucessfully <a href="add_news.php">Add Next one.</a></td>
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
													<td class="red-left">Error. <a href="add_news.php">Please try again.</a></td>
													<td class="red-right"><a class="close-red"><img src="../images/table/icon_close_red.gif"   alt="" /></a></td>
												</tr>
												</table>
												</div>
												<!--  end message-red -->
						<?php
				}
			
			}
		}
	?>





		<form action='<?php $_SERVER["PHP_SELF"];?>' method='post' enctype='multipart/form-data'>
										<!-- start id-form -->
										<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
											<tr>
												<th valign="top">News Title:</th>
												<td><input type="text" name = "title" class="inp-form-error" />&nbsp;&nbsp;  <span class="error">* <?php echo $error; ?></span></td>
											</tr>
											<tr>
												<th valign="top">Description:</th>
												<td><textarea rows="" cols="" name="description" class="form-textarea"></textarea>&nbsp;&nbsp;  <span class="error">* <?php echo $error;?></span></td>
												<td></td>
											</tr>
												
										
										<tr>
											<th>Image :</th>
											<td>  <input type="file" name = "images" />&nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $imgerror1; echo $imgerror2; ?></span></td>
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
			<div id="related-act-inner">
			
				<div class="left"><a href=""><img src="../images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>View All News</h5>
					
					<ul class="greyarrow">
				
						<li><a href="view_news.php">Click here to View all News</a> </li>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>            
			
				<div class="left"><a href=""><img src="../images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Add another Newss</h5>
					<ul class="greyarrow"> 
						<li><a href="add_news.php">Click here to add another News</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="../images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Delete News</h5>
				
					<ul class="greyarrow">
						 
						<li><a href="view_news.php">Click here to delete News</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				
				
				<div class="left"><a href=""><img src="../images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Edit News</h5>
					
					<ul class="greyarrow">
				
						<li><a href="view_news.php">Click here to Edit News</a> </li>
					</ul>
				</div>
				<div class="clear"></div>
				
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


<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<?php
include '../includes/admin_footer.php';
?>