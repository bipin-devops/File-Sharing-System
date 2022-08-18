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
			<?php

	if(isset($_POST['oldpassword'])) {
		$oldpassword = md5($_POST['oldpassword']);
        $newpassword = $_POST['newpassword'];
        $repassword = $_POST['repassword'];
        $id=$_SESSION['userid'];
        $result = mysqli_query($connection, "SELECT password FROM tbl_user WHERE id='$id'");    

		$passwod = mysqli_fetch_assoc($result);

		$old_password = $passwod['password'];

		if($oldpassword == $old_password && $newpassword==$repassword) {
			 mysqli_query($connection, "UPDATE tbl_user SET password=md5('$newpassword') WHERE id='$id'");	
		
									?>
									<!-- start message-green -->
								 <div class="alert alert-dismissible admission-alert success" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                           Password changed Successfully !! 
                         </div>
									<!--  end message-green -->	
									<?php	
										} else{ 
									?>
												<!--  start message-red -->
										  <div class="alert alert-dismissible admission-alert danger" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                 Error  <a href="register.php"> Please Re-try</a>
                </div> 
												<!--  end message-red -->
									<?php
										}

								
	}
?>

	<div class="courses_box1">
	   <div class="container">
		 <form class="contact_form" action='<?php $_SERVER["PHP_SELF"];?>' method='post'  >
		 	<h2>Change Password</h2>
			<div class="col-md-6 grid_6">
				Old Password : <input type="password"  name="oldpassword"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				New Password : <input type="password"  name="newpassword"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				Re Password : <input type="password"  name="repassword"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				 <input type="submit" class="more_btn" data-type="submit" value="Change Password">
			</div>
	
		
          
      
		 </form>
	   	 
	   	 	
	   	  <div class="clearfix"> </div>
	   </div>
	</div>
</div>






<?php
include '../includes/footer.php';
?>
