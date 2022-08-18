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
	   	 		$sqlcount=" select count(*) as totalCount from tbl_news ";
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
$itemsPerPage = 9;
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


	   	 
			

				$category="select * from tbl_news where status='active' order by upload_date $limit";
				$result=mysqli_query($connection, $category);
				if(mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_assoc($result)) {
                                 $aid = $row['user_id'];
                                $admin = "select * from tbl_admin where id='$aid'";
                                $r = mysqli_fetch_assoc(mysqli_query($connection,$admin))
			?>
	   	  <div class="blog_box1">
	   	   <dl class="item_info_dl">
	   	   	<h2> <?php echo"<a href='recentnews_inside.php?id=$row[id]'>$row[news_title]</a>";?></h2>
		    <dd>
				<address class="item_createdby">
					Posted by <a href="#"><?=$r['username']?></a>			
				</address>
			</dd>
			<dd>
		       <time datetime="2015-05-01 19:45" class="item_published">
			    on <?=$row['upload_date']	?>		</time>
	        </dd>
			<dd>
		      <span class="comment">
		        <a href="#">
        <?php
        $id=$row['id'];
          $number="SELECT count(*) as Totalcomment FROM tbl_comment where file_id='$id'";
          $nresult=mysqli_query($connection,$number);
              $nrow=mysqli_fetch_assoc($nresult);
          ?>
        <span ><?php echo $nrow['Totalcomment']; ?> </span><br>
            </a>
	          </span>
	       </dd>
		 </dl>
		 <a href="#"><img style="max-width:80%;"src="../images/<?=$row['news_image']?>" height=500 width=1000 /></a>
		 <p> <?php 
                  $string=$row['news_description'];
                  if (strlen($string) > 500) {
                        $trimstring = substr($string, 0, 550);
                        } else {
                        $trimstring = $string;
                               }
                  echo $trimstring;
                 
                  ?></p>
                  <?php echo"<a href='recentnews_inside.php?id=$row[id]' class='radial_but'>Ream More</a>";?>

	    </div>
	   
  <?php
				}
			}

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