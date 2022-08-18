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
 echo $row['num'];
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

  
   <div class="bottom_content">
    
    <?php
    $id=$_GET['id'];
          $sqlcount=" select count(*) as totalCount from tbl_file where cat_id='$id' ";
          $result=mysqli_query($connection, $sqlcount);
          $tCount = mysqli_fetch_assoc($result);
          $nr = $tCount['totalCount'];
if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
}
//This is where we set how many database items to show on each page
$itemsPerPage = 5;
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
}
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage;




     $id=$_GET['id'];
                            $sql = "SELECT title FROM tbl_category where id='$id' $limit";
                            $cat = mysqli_query($connection, $sql);
                            $row=mysqli_fetch_assoc($cat);
                             if(mysqli_num_rows($cat)>0) {
                              ?>
                  

                  <h3><?=$row['title']?></h3>
                  
                  <?php
                }
                      ?>    
     <div class="grid_2">

      <?php
        $id=$_GET['id'];
          $file="select * from tbl_file where cat_id=$id and status='active'";
        $result=mysqli_query($connection, $file);
        if(mysqli_num_rows($result)>0) {
          while ($row=mysqli_fetch_assoc($result)) {
      ?>
      
      <div class="col-md-4 portfolio-left">
            <div class="portfolio-img event-img">
                <img src="../images/<?=$row['images']?>" class="img-responsive" alt="" height=200 width=200/>
                <div class="over-image"></div>
            </div>
            <div class="portfolio-description">
               <h4><?php echo"<a href='single.php?id=$row[id]'>$row[file_name]</a>";?></h4>
               <?php 
                  $string=$row['description'];
                  if (strlen($string) > 150) {
                        $trimstring = substr($string, 0, 150);
                        } else {
                        $trimstring = $string;
                               }
                  echo $trimstring;
                 
                  ?>
               
                <ul class="meta-post">
                              <li class="category">
                     <?php echo"<a href='single.php?id=$row[id]'>Like</a>";?>
                </li>
                        <li class="category1">
                          <?php
                             if(isset($_SESSION['userid'])) {
                                
                           ?>

                              
                           <?php echo"<a href='single.php?id=$row[id]'>$row[download_count]  Download</a>";?>
                      <?php
                       
                          
                            } else {
                          ?>
                              <a href="login.php">Download</a>
                          <?php
                            }
                          ?>
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

<?php
$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    }
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    }
}
echo $paginationDisplay;
?>

        </div>
       
        
     </div>
    
    

        <?php
          include '../includes/footer.php';
          ?>