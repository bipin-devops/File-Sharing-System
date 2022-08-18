<?php
include '../connection.php';
include '../includes/header.php';

 

?>

<!-- banner -->
  <div class="banner">
        <script>
    </script>
      <!-- banner Slider starts Here -->
          <script src="../js/jquery/responsiveslides.min.js"></script>
           <script>
            // You can also use "$(window).load(function() {"
            $(function () {
              // Slideshow 4
              $("#slider3").responsiveSlides({
              auto: true,
              pager: true,
              nav: true,
              speed: 500,
              namespace: "callbacks",
              before: function () {
                $('.events').append("<li>before event fired.</li>");
              },
              after: function () {
                $('.events').append("<li>after event fired.</li>");
              }
              });
          
            });
            </script>
          <!--//End-slider-script -->
          <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
                 <?php
                              $news="SELECT * FROM `tbl_slider` where status='active' order by rand()  limit 1";
                            $result=mysqli_query($connection, $news);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                ?>
         

              <li>
                <div class="banner-bg">
                  
                  <div class="container">
                    <div class="banner-info">
                     
                      <p style="margin-top:150px;">"<?=$row['testimonial']?>" -<i> <?=$row['author']?></i>.
                      </p>
                      
                    </div>
                  </div>
                </div>
              </li> 
              <?php
                  }
                }
              ?>     
            </ul>
              </div>
  </div>
  <!-- //banner -->
   
  <div class="grid_1">
      <div class="container">
        
      
        <div class="col-md-4">
                <div class="news">

                    <h1>News</h1>
                    <div class="section-content">
                         <?php
                            $news="select * from tbl_news where status='active' ORDER BY upload_date ASC LIMIT 4";
                            $result=mysqli_query($connection, $news);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                          ?>
                        <article>
                            <figure class="date"><i class="fa fa-tags"></i><?=$row['upload_date']?> <i class="fa fa-file"></i><?php echo  "<a href='recentnews_inside.php?id=$row[id]'>";echo strtoupper ("$row[news_title]</a>");?></figure>
                             
                                    <?php 
                                        $string=$row['news_description'];
                                        if (strlen($string) > 120) {
                                              $trimstring = substr($string, 0, 120);
                                              } else {
                                              $trimstring = $string;
                                                     }
                                        echo $trimstring;
                                       
                                        ?>
                      
                            
                        </article>
                      
                         <?php
                              }
                          }
                          ?>
                    </div><!-- /.section-content -->
                    <a href="#" class="read-more">All News</a>
                </div><!-- /.news-small -->
            </div>

           
            <div class="news">
              <h1 >Hot Topics</h1>
            <div class="col-md-8">

                          <div class="col-md-6 ">
                                  <figure class="team_member">
                                    <img src="../images/fc.jpg" class="img-responsive wp-post-image" alt=""/>
                                    <div></div>
                                    <figcaption><h3 class="person-title"><a href="random.php">Random Files</a></h3>
                                     
                                      </figcaption>
                                   </figure>
                         </div> 
                          <div class="col-md-6 ">
                                  <figure class="team_member">
                                    <img src="../images/fc.jpg" class="img-responsive wp-post-image" alt=""/>
                                    <div></div>
                                    <figcaption><h3 class="person-title"><a href="most_download.php">Most Downloaded</a></h3>
                                     
                                     </figcaption>
                                   </figure>
                            </div> 
          </div>
                    <div class="col-md-8" style="margin-top:10px;">
                                   <div class="col-md-6 ">
                                          <figure class="team_member">
                                            <img src="../images/fc.jpg" class="img-responsive wp-post-image" alt=""/>
                                            <div></div>
                                            <figcaption><h3 class="person-title"><a href="most_liked.php">Most Liked</a></h3>
                                              
                                              </figcaption>
                                           </figure>
                                 </div> 

                                  <div class="col-md-6 ">
                                          <figure class="team_member">
                                            <img src="../images/fc.jpg" class="img-responsive wp-post-image" alt=""/>
                                            <div></div>
                                            <figcaption><h3 class="person-title"><a href="most_viewed.php">Most Viewed</a></h3>
                                             
                                             </figcaption>
                                           </figure>
                                    </div>


                         </div> 
          </div>
      </div>

</div>

  
  <div class="bg_2">
    <div class="container">
       <div class="col-md-6 service_2-left">
              <h2>Professional Education Programs</h2>
         </div>
         <div class="col-md-6 service_2-right">
            <p>Founded in 2015 with the goal of making knowledge sharing easy,Build your knowledge quickly from concise, well-presented content from top experts.Get up to speed on any topic. You’ll find content from experts in every imaginable fields.</p><br>
            <p>Show what you know through a presentation, or document.Visual formats help you stand out and resonate more with your readers.When you upload to LEARN, you reach an audience that’s interested in your content.This can help you build your reputation with the right audience and cultivate more professional opportunities.</P>
         </div>
         <div class="clearfix"> </div>
    </div>
  </div>


   <div class="bottom_content">  
     <h3>Recent Uploads</h3>
     <div class="grid_2">
      
                        <?php
                            $files="select * from tbl_file where status='active' ORDER BY upload_date ASC LIMIT 6";
                            $result=mysqli_query($connection, $files);
                            if(mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                          ?>
      <div class="col-md-4 portfolio-left">
            <div class="portfolio-img event-img">
                <img src="../images/<?=$row['images']?>"  height="250" width="200"/>
                <div class="over-image"></div>
            </div>
            <div class="portfolio-description">
               <h4><?php echo"<a href='single.php?id=$row[id]'>$row[file_name]</a>";?></h4>
               <p>
                <?php 
                  $string=$row['description'];
                  if (strlen($string) > 150) {
                        $trimstring = substr($string, 0, 150);
                        } else {
                        $trimstring = $string;
                               }
                  echo $trimstring;
                 
                  ?>
               </p>
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

    ?>
        <div class="clearfix"> </div>
     </div>
    </div>

    <?php
      include '../includes/footer.php';
      ?>