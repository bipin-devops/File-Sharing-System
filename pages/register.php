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

<?php
//declaring variables and passing empty values
    $fname="";
    $lname="";
    $email="";
    $username="";
    $password="";
    $contact= "";
    $address="";
    $error="";
    $nameerror="";
    $emailerror="";
    $phoneerror="";
    $usernameerror="";
    $passworderror="";
    $imgerror1="";
    

if(isset($_POST['fname'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $Cpassword=$_POST['cpassword'];
    $contact= $_POST['contact'];
    $address=$_POST['address'];    
                            //validation, checking whether the user input is empty or not
                   if ($fname=="" || $email=="" || $username=="" || $password=="" || $contact=="" || $images="") {
                    $error.="Please fill all the required fields. <br> ";   
                   } else {

                     // check if name only contains letters and whitespace
                             if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                                    $nameerror = "Only letters and white space allowed"; 
                                 }
                    //Email format validation
                             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                   $emailerror = "$email is not a valid email format"; 
                                 }
                    //phone number validation
                                 //is_numeric checks whether string is number or not
                             if( !is_numeric($contact)) {
                                    $phoneerror.="Phone number must contains Numbers <br>"; 
                                }
                                    

                    //username length validation below 4 or above 32 is not allowed
                                //strlen checks length of string
                             if(strlen ($username)<5 || strlen($username)>33) {
                                    $usernameerror.="Username must be in between 4 to 32 letters <br>"; 
                                }
                    //username validation, username must contain letters number and '_' 
                                 if (!preg_match("/^[0-9_a-zA-Z]*$/", $username)) {
                                        $usernameerror.= "Only letters, numbers and '_' allowed";
                                    }
                                         //validating image type 
                          if($_FILES["images"]["type"] == "image/png" || $_FILES["images"]["type"] == "image/jpg" || $_FILES["images"]["type"] == "image/jpeg" )
                                     {
                                        $imgerror1.= "";
                                     }
                                     else{
                                        $imgerror1.="JPEG, PNG, JPG 2MB max per image";
                                     }

                    //password length validation below 4 or above 32 is not allowed
                             if( strlen($password)<5 || strlen($password)>33) {
                                    $passworderror.="Password must be in between 4 to 32 letters <br>"; 
                                }
                                //checking if username exits or not in database
                                    $checkuser = "SELECT * FROM tbl_user where username = '$username'";
                                    $res = mysqli_query($connection,$checkuser);
                                    if(mysqli_num_rows($res)>0){
                                     $usernameerror.="$username is already taken.";
                                    }
                                    
                                    $checkemail = "SELECT * FROM tbl_user where email = '$email'";
                                    $res = mysqli_query($connection,$checkemail);
                                    if(mysqli_num_rows($res)>0){
                                     $emailerror.="$email is already been used.";
                                    }


                   }

//if any errors contain values then datas arent stored in database          
if($error=="" && $nameerror=="" && $emailerror=="" && $phoneerror==""  && $usernameerror=="" && $passworderror==""  && $imgerror1=="")
 {
      $images="";
    
                    if(is_uploaded_file($_FILES["images"]['tmp_name'])) {
                        move_uploaded_file($_FILES["images"]['tmp_name'],"../images/". $_FILES["images"]['name']);
                        $images = $_FILES["images"]['name'];
                    }

                    if($password == $Cpassword){
                        $sql="Insert into tbl_user(`fname`,`lname`,`email`,`username`,`password`,`contact`,`address`,`images`) 
                            values('$fname','$lname','$email','$username',MD5('$password'),'$contact','$address','$images')";
                        $result=mysqli_query($connection,$sql);//return     true or falseif($result) {
        if($result){
                ?>
                            <div class="alert alert-dismissible admission-alert success" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                           Congratulation !! User Registered Successfully 
                         </div>
             
                <?php
                    }
                }
                ?>  
        <?php
               } else{
          ?>
               <div class="alert alert-dismissible admission-alert danger" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                 <?php echo $error; echo $nameerror; echo $emailerror; echo $phoneerror; echo $imgerror1;  echo $usernameerror; echo $passworderror;?> <a href="register.php"> Please Re-try</a>
                </div> 
           <?php
                }
            }
            ?>



<div class="upload">
    <h4>REGISTER NEW ACCOUNT</h4>
  <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' enctype='multipart/form-data'>
    <label for="fname">First Name  </label>
    <input type="text" name="fname">
    <label for="lname">Last Name  </label>
    <input type="text" name="lname">
    <label for="Address">Address </label>
    <input type="text" name="address">
    <label for="contact">Contact  </label>
    <input type="text" name="contact">
    <label for="email">Email  </label>
    <input type="text" name="email">
    <label for="username">Username  </label>
    <input type="text" name="username">
    <label for="password">Password   </label>
    <input type="password" name="password">
    <label for="cpassword">Confirm Password   </label>
    <input type="password" name="cpassword">
    <b style="font-size:1em;color:gray;"> Image : </b><input style="margin-right:40%;" type="file" name="images"><br><br>
    
    <input type="submit" value="Register">
    <div class="form-group">
    <p style="color:gray;">Already have an account? <a href="login.php" >SignUp</a></p>
                
    </div>
            
  </form>
</div>












<?php
include '../includes/footer.php';
?>