 <?php
include '../connection.php';
include '../includes/header.php';

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
	<div class="features">
	   <div class="container">
	   
     <?php
        $id=$_GET['id'];
          $news="select * from tbl_news where id=$id and status='active'";
        $result=mysqli_query($connection, $news);
        if(mysqli_num_rows($result)>0) {
          while ($row=mysqli_fetch_assoc($result)) {
          	$aid = $row['user_id'];
                                $admin = "select * from tbl_admin where id='$aid'";
                                $r = mysqli_fetch_assoc(mysqli_query($connection,$admin))
      ?>

	   	  <div class="blog_box1">
			 <dl class="item_info_dl">
 			  	<h2><a href="#"><?=$row['news_title']?></a></h2>
		 			<a href="#"><img src="../images/<?=$row['news_image']?>" height=500 width=800/></a>
						    <dd>
								<address class="item_createdby">
									Posted by <a href="#"><?=$r['username']?></a>			
								</address>
							</dd>
							<dd>
						       <time datetime="2015-05-01 19:45" class="item_published">
							    on <?=$row['upload_date']?>			</time>
					        </dd>
							<dd>
						      <span class="comment">
						        <a href="#">	
						        	<?php
								 		$number="SELECT count(*) as Totalcomment FROM tbl_comment where file_id='$id'";
								 		$nresult=mysqli_query($connection,$number);
						   	  			$nrow=mysqli_fetch_assoc($nresult);
								 		?>
			 	<span ><?php echo $nrow['Totalcomment']; ?></span><br></a>
					          </span>
					       </dd>
		 </dl>
		 <p><?=$row['news_description']?></p>
	     </div>


	     	<div class="col-md-8 detail">
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