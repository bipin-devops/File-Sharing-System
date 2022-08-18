<?php
include '../connection.php';
include '../includes/header.php';

if (!isset($_SESSION['userid'])) {
	header('location:login.php');
}
?>
<!-- banner -->

  <div class="courses_banner">

                 <?php
                              $news="SELECT * FROM `tbl_slider` where status='active' order by rand()  limit 1";
                            $result=mysqli_query($connection, $news);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                ?>
                    <div class="banner-info">
                      <p >"<?=$row['testimonial']?>" -<i> <?=$row['author']?></i>. </p>
                    </div>
              <?php
                  }
                }
              ?>   
  </div>

    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <div class="col-md-6 about_left">
	   	  	<h1 >Edit Profile</h1>
				<?php
				$userid = $_SESSION['userid'];
					$user="select * from tbl_user where id='$userid'";
					$result=mysqli_query($connection, $user);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
				?>
	   	
	   <div class="container">
		 <form class="contact_form" action='<?php $_SERVER["PHP_SELF"];?>' method='post'  >
		 
		 	



			<div class="col-md-6 grid_6">
				First Name : <input type="text"  name="fname"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				Last Name : <input type="text"  name="lname"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				Address : <input type="text"  name="address"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				Phone : <input type="text"  name="phone"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
			
				 <input type="submit" class="more_btn" data-type="submit" value="Edit Profile">
			</div> 
		 </form>
	  	  <div class="clearfix"> </div>
	</div>
		
    
          </div>
	   	  <div style="margin-top:10%;"class="col-md-6">
	   	  	<img src="../images/<?=$row['images']?>" class="img-responsive" alt=""/>
	   	  	<?php echo"<a href='changeppic.php?id=$row[id]' style='float:right;margin-right:5%;' >Change Profile Picture</a>";?>
	   	  
	   	  </div>
	   	 	<?php
					}
				}
			?>
	   	  <div class="clearfix"> </div>
	   </div>
	</div>

	<?php
	$id=$_GET['id'];
	$fname="";
	$lname="";
	$address="";
	$phone="";
	$error="";
	$error1="";
			if(isset($_POST['fname'])){
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$address=$_POST['address'];
				$phone=$_POST['phone'];
				

				  if ($fname=="" || $lname=="" || $address=="" || $phone=="" ) {
				    $error.="Please fill all the required fields.";	
				   } else{
				   		 //phone number validation
                                 //is_numeric checks whether string is number or not
                             if( !is_numeric($phone)) {
                                    $error1.="Phone number must contains Numbers "; 
                                }

				   }
		
if($error=="" && $error1==""  ) {

		
	 	$sql = " update tbl_user set fname='$fname', lname='$lname', address='$address', contact='$phone' where id='$id' "; 
		$result=mysqli_query($connection,$sql);

			if($result)

			{ 
									?>
									<!-- start message-green -->
						<div class="alert alert-dismissible admission-alert success" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                           Congratulation !! Profile Updated Successfully 
                         </div>
									<!--  end message-green -->	
									<?php	
										}
										} else{ 
									?>
												<!--  start message-red -->
			<div class="alert alert-dismissible admission-alert danger" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                 <?php echo $error; echo $error1; ?> <a href="#"> Please Re-try</a>
                </div> 
												<!--  end message-red -->
						<?php
				}
			
			
		}
	?>




</div>

<?php
include '../includes/footer.php';
?>
