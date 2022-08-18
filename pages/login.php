<?php
include '../connection.php';
include '../includes/header.php';

if (isset($_SESSION['userid'])) {
  header('location:index.php');
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

<div class="upload">
    <h4>LOGIN TO YOUR ACCOUNT</h4>
  <form action='validation_user.php' method='post' enctype='multipart/form-data'>
    <label for="username">Username   </label>
    <input type="text" name="username">
     <label for="password">Password   </label>
    <input type="password" name="password">
    
    <input type="submit" value="Sign In">
    <div class="form-group">
		    	<input type="checkbox" name="remember" value="true"> Remember Me <i style="color:gray;">Don't have an account? <a href="register.php" >SignUp</a></i>
		    	 <a href="forget_password.php" >Forget Password ?</a>
		    	
	</div>
	        
  </form>
</div>


<?php
include '../includes/footer.php';
?>
