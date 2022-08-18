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
	   <div class="bottom_content">  
     <h3>Search Results</h3>
     <div class="grid_2">
    <?php
            $s=$_GET["s"];
            $sqlMenu = " select * from tbl_file where file_name like '%$s%' or description like '%$s%'   ";
            $result = mysqli_query($connection, $sqlMenu);
            while($row=mysqli_fetch_assoc($result)) {
                ?>
                     <div class="grid_2">
      
                        <?php
                         
                            $result=mysqli_query($connection, $sqlMenu);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                          ?>
      <div class="col-md-4 portfolio-left">
            <div class="portfolio-img event-img">
                <img src="../images/<?=$row['images']?>" class="img-responsive" alt="" height="400" width="500"/>
                <div class="over-image"></div>
            </div>
            <div class="portfolio-description">
               <h4><?php echo"<a href='single.php?id=$row[id]'>$row[file_name]</a>";?></h4>
               <?php 
                  $string=$row['description'];
                  if (strlen($string) > 100) {
                        $trimstring = substr($string, 0, 100);
                        } else {
                        $trimstring = $string;
                               }
                  echo $trimstring;
                 
                  ?>
                <span>
                  <a href="#">Keywords</a>
                  <a href="#">Keywords</a>
                </span><br>
            <ul class="meta-post">
                                <li class="category">
                     <?php echo"<a href='single.php?id=$row[id]'>Like</a>";?>
                </li>
                        <li class="category1">
                       

                              
                           <?php echo"<a href='single.php?id=$row[id]'>$row[download_count]  Download</a>";?>
                    
                          
                       
                         </li>                             
              </ul>
            </div>
            <div class="clearfix"> </div>
        </div> 

         <?php
        }
      }
  }

    ?>
        <div class="clearfix"> </div>
     </div>

 </div>
</div>
	  
<?php
include '../includes/footer.php';
?>