<?php
include '../includes/header.php';
include ("../database/connection.php");

if (isset($_SESSION['userid'])) {
  header('location:index.php');
}
?>
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
    if(isset($_POST["email"]))
    {
      $email=$_POST['email'];
      $sql="select * from tbl_user where email='$email'";
      $result=mysqli_query($connection, $sql);
      $num=mysqli_num_rows($result);
      if($num>0)
      {
        $random=rand(99999,999999);
        $sql="update tbl_user set password=MD5('$random') where email='$email'";
        $r=mysqli_query($connection,$sql);
         $message="Password Has Been Reset, Your New Password is $random";
        
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    ?>

<div class="upload">
    <h4>RESET PASSWORD</h4>
  <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post'>
    <label for="Email">Email   </label>
    <input type="text" name="email">
 
    
    <input type="submit" value="Reset">
          
  </form>
</div>






<?php
include '../includes/footer.php';
?>
