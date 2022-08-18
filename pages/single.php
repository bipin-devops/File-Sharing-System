 <?php 
	include '../connection.php';
	include '../includes/header.php';


if(isset($_POST['fileId'])) {
  if(isset($_SESSION['userid'])) {
  $fileId = $_POST['fileId'];
  $userId = $_SESSION['userid'];

  $sql = "SELECT COUNT(*) as num FROM tbl_like WHERE file_id='$fileId' AND user_id='$userId'";

 $result =  mysqli_query($connection, $sql);

 $row = mysqli_fetch_assoc($result);
 //echo $row['num'];
 if($row['num'] == 0) {
    $sql = "INSERT INTO tbl_like(`file_id`, `user_id`)  VALUES('$fileId', '$userId')";
     mysqli_query($connection, $sql);
 } else {
    $sql = "DELETE FROM tbl_like WHERE file_id='$fileId' AND user_id='$userId'";
     mysqli_query($connection, $sql);
 }
} else {
   header('location:login.php');
}
}
	
	?>
	

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
	   	  <div class="col-md-4">
	   	  	<div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">September 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2015-08-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2015-08-31"><div class="day-contents">31</div></td><td class="day today calendar-day-2015-09-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-09-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-09-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-09-04"><div class="day-contents">4</div></td><td class="day calendar-day-2015-09-05"><div class="day-contents">5</div></td></tr><tr><td class="day calendar-day-2015-09-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-09-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-09-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-09-09"><div class="day-contents">9</div></td><td class="day event calendar-day-2015-09-10"><div class="day-contents">10</div></td><td class="day event calendar-day-2015-09-11"><div class="day-contents">11</div></td><td class="day event calendar-day-2015-09-12"><div class="day-contents">12</div></td></tr><tr><td class="day event calendar-day-2015-09-13"><div class="day-contents">13</div></td><td class="day event calendar-day-2015-09-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-09-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-09-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-09-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-09-18"><div class="day-contents">18</div></td><td class="day calendar-day-2015-09-19"><div class="day-contents">19</div></td></tr><tr><td class="day calendar-day-2015-09-20"><div class="day-contents">20</div></td><td class="day event calendar-day-2015-09-21"><div class="day-contents">21</div></td><td class="day event calendar-day-2015-09-22"><div class="day-contents">22</div></td><td class="day event calendar-day-2015-09-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-09-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-09-25"><div class="day-contents">25</div></td><td class="day calendar-day-2015-09-26"><div class="day-contents">26</div></td></tr><tr><td class="day calendar-day-2015-09-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-09-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-09-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-09-30"><div class="day-contents">30</div></td><td class="day adjacent-month next-month calendar-day-2015-10-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2015-10-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2015-10-03"><div class="day-contents">3</div></td></tr></tbody></table></div></div>				
       
       		
	      <ul class="posts">
	      	<h3>Recent Posts</h3>
	      	<?php
                            $news="select * from tbl_news where status='active' ORDER BY upload_date ASC LIMIT 4";
                            $result=mysqli_query($connection, $news);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                            	$aid = $row['user_id'];
           						$admin = "select * from tbl_admin where id='$aid'";
           						$r = mysqli_fetch_assoc(mysqli_query($connection,$admin));
                          ?>
			<li>
				<article class="entry-item">
					<div class="entry-thumb pull-left">
						<img src="../images/<?=$row['news_image']?>" height=70 width=80/>
					</div>
					<div class="entry-content">
						<h6><a href="#">Posted By</a></h6>
						<p><a href="#"><?=$r['username']?> &nbsp;&nbsp; <?=$row['upload_date']?></a></p>
					</div>
					<div class="clearfix"> </div>
				</article>
			</li>
		<?php
				}
			}
		?>
		
         </ul>
		        <div class="social-widget">
          	<h2>Connect with us</h2>
          	  <ul class="courses_social">
				<li class="facebook-icon">
					<div>
						<a href="#" class="fa fa-facebook"></a>
						<p>2154</p>
					</div>        							
				</li>
				<li class="twitter-icon">
					<div>
						<a href="#" class="fa fa-twitter"></a>
						<p>1425</p>
					</div>        							
				</li>
				<li class="gplus-icon">
					<div>
						<a href="#" class="fa fa-google-plus"></a>
						<p>2150</p>
					</div>        							
				</li>
				<div class="clearfix"> </div>
			 </ul>
           </div>
		</div>
		
	 <?php
     $id=$_GET['id'];
     $sql="update tbl_file set view_count=view_count+1 where id='$id'";
     $result=mysqli_query($connection, $sql);
                            $files="select * from tbl_file where id=$id and status='active'";
                            $result=mysqli_query($connection, $files);
							$row=mysqli_fetch_assoc($result);
							if ($row['admin_id'] != 0) {
								$aid = $row['admin_id'];
           						$admin = "select * from tbl_admin where id='$aid'";
           						$r = mysqli_fetch_assoc(mysqli_query($connection,$admin));
							}elseif ($row['user_id'] != 0) {
								$aid = $row['user_id'];
           						$admin = "select * from tbl_user where id='$aid'";
           						$r = mysqli_fetch_assoc(mysqli_query($connection,$admin));
							}
      ?>

		<div class="col-md-8 detail">
	       <img src="../images/<?=$row['images']?>" height=550 width=800 />
	       <h3><?=$row['file_name']?></h3>
	        <ul class="meta-post">
      		
      		<?php
           		
           		//var_dump($r);
           	?>
                <li class="author">
                    by <a href="#"><?=$r['username']?></a>
                </li>
                <li class="view">
                   <?=$row['upload_date']?>
                </li>
				
                    <li class="category">
                          <form method="post" action="<?=$_SERVER['PHP_SELF']?>?id=<?php echo $row['id']; ?>" id="frmlike">
                            <input type="hidden" name="fileId" value="<?=$row['id']?>">
                              <?php echo"<a href='javascript:void(0)' onclick=\"$('#frmlike').submit();\">Like</a>";?>
                          	
                          </form>
                        </li>



                       	  <?php
                             if(isset($_SESSION['userid'])) {
                             	 $id=$_GET['id'];
							     $sql="update tbl_file set download_count=download_count+1 where id='$id'";
							     $result=mysqli_query($connection, $sql);
                                
                           ?>
                              
                            <li class="category1">
                     		<?php echo "<a href='../upload_file/$row[files]' download>Download</a>";?>
                			</li> 

                          <?php

                            } else {
                          ?>
                          <li class="category1">
                     		<?php echo "<a href='login.php'>Download</a>";?>
                		</li> 
                              
                          <?php
                            }
                          ?>



                                           
           </ul>
           <p><?=$row['description']?></p>
           <div class="author-box author-box1">
           
                  <div class="author-box-left"><img src="../images/<?=$r['images']?>" class="img-responsive" alt=""/></div>
				  <div class="author-box-right">		
					<h4>Posted by <a href="#"><?=$r['username']?></a></h4>
                   
				  </div>
				  <div class="clearfix"> </div>
			 </div>
			 
			<div class="scroll">
				
				 	 <div class="comment_section">
			 	<h4>
			 		<?php
			 		$number="SELECT count(*) as Totalcomment FROM tbl_comment where file_id='$id'";
			 		$nresult=mysqli_query($connection,$number);
	   	  			$nrow=mysqli_fetch_assoc($nresult);
			 		?>
			 	<span ><?php echo $nrow['Totalcomment']; ?> Comments </span><br>
	   	  			
			 	</h4>
			 	 <?php
     				$id=$_GET['id'];
                            $comment="select * from tbl_comment where file_id='$id'";
							$result=mysqli_query($connection, $comment);
							if(mysqli_num_rows($result)>0) {
							while ($row=mysqli_fetch_assoc($result)) {
      				?>
			 	<ul class="comment-list">
                   <li>
				     <div class="author-box">
				     		<?php
				           		$userid = $row['user_id'];
				           		$user = "select * from tbl_user where id='$userid'";
				           		$r = mysqli_fetch_assoc(mysqli_query($connection,$user));
				           		//var_dump($r);
				           	?>
				       <div class="author-box_left"><img src="../images/<?=$r['images']?>" class="img-responsive" alt=""/></div>
				       <div class="author-box_right">
				        <h5><a href="#"><?=$r['username']?></a><span class="pull-right"><a class="comment-reply-link" href="#">Reply</a></span></h5>
			            <span class="m_1"><?=$row['date']?></span>
			            <p><?=$row['comment']?></p>
				
				      </div> 
				      <div class="clearfix"> </div>
				     </div>
				  </li>
                 </ul>
                  <?php
			 	}
			 }
			 ?>
			 </div>
			
			</div>
			
			

			 <form class="comment-form" action='<?php $_SERVER["PHP_SELF"];?>' method='post'>

			 	<h4>Leave a comment</h4>
				  <div class="col-md-13">
				<textarea name="comment" aria-required="true" id="comment" class="form-control" placeholder="Comment"></textarea>
	              </div>
	              <div class="clearfix"> </div>						
				  
					<div class="form-submit">
				  	<input name="submit" type="submit" id="submit" class="submit_1 btn btn-primary btn-block" value="Add comment"> 
				  </div>	  
           </form>
					<?php
			if(isset($_POST['comment'])){
				$comment=$_POST['comment'];
				$date=date("Y/m/d");
				$user = $_SESSION['userid'];
				$fileid=$_GET['id'];
				

			       
               if(isset($_SESSION['userid'])) {
                                
             $sql="Insert into tbl_comment(`user_id`,`file_id`,`comment`,`date`) 
					values('$user','$fileid','$comment','$date')";
									
			$result=mysqli_query($connection,$sql);
		
                            } else {
                          
                               echo "<script>
                               	location.replace('login.php');
                               </script>";
                         
                            }
                          

			
			
			}
	?>  
				  
		 </div>


	     <div class="clearfix"> </div>
	   </div>
	</div>
     <?php 
	include '../includes/footer.php';
	?>