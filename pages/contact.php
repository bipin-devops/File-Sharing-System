 <?php
include '../connection.php';
include '../includes/header.php';

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

	   <div class="container">
	   	  <h1>How to find us</h1>
	   	  <div class="map">
			 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
		  </div>
		  <p>Founded in 2015 with the goal of making knowledge sharing easy,Build your knowledge quickly from concise, well-presented content from top experts.Get up to speed on any topic. You’ll find content from experts in every imaginable fields.Show what you know through a presentation, or document.Visual formats help you stand out and resonate more with your readers.When you upload to LEARN, you reach an audience that’s interested in your content.This can help you build your reputation with the right audience and cultivate more professional opportunities.</p>
		  <div class="wrapper">
				<div class="col_1">
					<i class="fa fa-home  icon2"></i>
					<div class="box">
						<p class="marTop9">Kathmandu,thapathali,<br>Trade Tower, 3rd floor</p>
					</div>
				</div>

				<div class="col_2">
					<i class="fa fa-phone  icon2"></i>
					<div class="box">
						<p class="marTop9">+01 4235888<br>+977 98425 71729</p>
					</div>
				</div>

				<div class="col_2">
					<i class="fa fa-envelope icon2"></i>
					<div class="box">
						<p class="m_6"><a href="#" class="link4">info@Learn.com</a></p>
					</div>
				</div>
				<div class="clearfix"> </div>
		 </div>
		<?php
		$name="";
		$phone="";
		$email="";
		$message="";
		$error="";
		$emailerror="";
		

            if(isset($_POST['name'])){
                $name=$_POST['name'];
                $phone = $_POST['phone'];
                $email=$_POST['email'];
                $message=$_POST['message'];
                //$day=$_POST['day'];
                //$month=$_POST['month'];
                //$year=$_POST['year'];
                $date=date("Y-m-d");
           
           if ($name=="" || $message=="" || $email==""  ) {
                    $error.="Please fill all the required fields. <br> ";   
                   } else {
                   	  //Email format validation
                             if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                              {
                                   $emailerror = "$email is not a valid email format"; 
                                 }
                    
                      }
 //if any errors contain values then datas arent stored in database          
if($error==""  && $emailerror==""   )
 {

                $sql="Insert into tbl_contact(`name`,`phone`,`email`,`date`,`message`) 
                                                            values('$name','$phone','$email','$date','$message')";
                                    
            	$result=mysqli_query($connection,$sql);
            
             if($result){
                ?>
                         <div class="alert alert-dismissible admission-alert success" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                           Message Send Successfully !! 
                         </div>
             
                <?php
                    }
                
                ?>  
        <?php
               } else{
          ?>
               <div class="alert alert-dismissible admission-alert danger" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                 <?php echo $error;  echo $emailerror;  ?> <a href="register.php"> Please Re-try</a>
                </div> 
           <?php
                }
            }
            ?>


		 <form class="contact_form" action='<?php $_SERVER["PHP_SELF"];?>' method='post'  >
		 	<h2>Contact form</h2>
			<div class="col-md-6 grid_6">
				Name : <input type="text"  name="name"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				Email : <input type="text"  name="email"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				Phone : <input type="text"  name="phone"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
			</div>
	
			<div class="col-md-6 grid_6">
				<br><br>Message : <textarea value="Message" name="message"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></textarea>
			</div>
            <div class="clearfix"> </div>
            <div class="btn_3">
			  <input type="submit" class="more_btn" data-type="submit" value="Send message">
		    </div>
		 </form>
				
						
	  </div>
	
	
 <?php
include '../includes/footer.php';
?>