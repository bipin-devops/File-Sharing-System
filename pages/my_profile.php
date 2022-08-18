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
	   	  	<h1 style="font-color:gray">My Profile</h1>
				<?php
				$userid = $_SESSION['userid'];
					$user="select * from tbl_user where id='$userid'";
					$result=mysqli_query($connection, $user);
					if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
				?>
	   	  	<ul class="about_links">
                <li><a href="#">Name : </a><?=$row['fname']." ".$row['lname']?></li>
                <li><a href="#">Username : </a><?=$row['username']?></li>
                <li><a href="#">Email : </a><?=$row['email']?></li>
                <li><a href="#">Address : </a><?=$row['address']?></li>
                <li><a href="#">Phone Number : </a><?=$row['contact']?></li>
            
            </ul>
		
           <?php echo"<a href='edit_profile.php?id=$row[id]' class='radial_but'>Edit Profile</a>";?>
          </div>
	   	  <div class="col-md-6">
	   	  	<img src="../images/<?=$row['images']?>" class="img-responsive" alt=""/>
	   	  </div>
	   	 	<?php
					}
				}
			?>
	   	
	   </div>
	</div>
   <div class="bottom_content">  
     <h3>My Uploaded Files</h3>
     <div class="grid_2">
      
                        <?php
                           $userid = $_SESSION['userid'];
							$files="select * from tbl_file where user_id='$userid'";
                            $result=mysqli_query($connection, $files);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                          ?>
   
        

            <div class="col-md-4 portfolio-left">
            <div class="portfolio-img event-img">
                <img src="../images/<?=$row['images']?>" height="250" width="200"/>
                 <div class="over-image"></div>
            </div>
            <div class="portfolio-description">
               <h4><?php echo"<a href='single.php?id=$row[id]'>$row[file_name]</a>";?></h4>
               <p>   
               	<?php 
                  $string=$row['description'];
                  if (strlen($string) > 250) {
                        $trimstring = substr($string, 0, 250);
                        } else {
                        $trimstring = $string;
                               }
                  echo $trimstring;
                 
                  ?>
              </p>
             
              
            </div>
            <div class="clearfix"> </div>
        </div>




         <?php
        }
      }

    ?>
        <div class="clearfix"> </div>
     </div>
    </div>






<?php
include '../includes/footer.php';
?>
