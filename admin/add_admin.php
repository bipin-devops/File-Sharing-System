<?php
//including session out for logout
//including connection 
//including header
include("../includes/checkout-session.php");
include("../database/connection.php");

    $id = $_SESSION['user_id'];
    
    $sql = "select * from tbl_admin where id='$id'";
    $res = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($res);
   if ($row['superadmin']=='no') {
      header('location:dashboard.php');
   }
//including footer

include '../includes/admin_header.php';


?>
    <script language="javascript">
        function ConfirmDelete() {
            return confirm("Are you sure to delete this data?");
        }
    </script>
    <div class="clear"></div>

    <!-- start content-outer -->
    <div id="content-outer">
        <!-- start content -->
        <div id="content">


            <div id="page-heading">
                <h1>Add Admin</h1></div>

            <?php
//declaring variables and passing empty values
    $fname="";
    $lname="";
    $email="";
    $username="";
    $password="";
    $phone= "";
    $address="";
    $error="";
    $nameerror="";
    $emailerror="";
    $phoneerror="";
    $usernameerror="";
    $passworderror="";
    $imgerror1="";
    $imgerror2="";
    

////when user clicks the submit button
if(isset($_POST['fname'])){
    //extracting data from the form
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $phone= $_POST['phone'];
    $address=$_POST['address'];
  $date=date("Y-m-d");
    

                    //validation, checking whether the user input is empty or not
                   if ($fname=="" || $email=="" || $username=="" || $password=="" || $phone=="" || $images="") {
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
                             if( !is_numeric($phone)) {
                                    $phoneerror.="Phone number must contains Numbers <br>"; 
                                }
                                    //checking if username exits or not in database
                                    $checkuser = "SELECT * FROM tbl_admin where username = '$username'";
                                    $res = mysqli_query($connection,$checkuser);
                                    if(mysqli_num_rows($res)>0){
                                     $usernameerror.="$username is already taken.";
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
                    //password length validation below 4 or above 32 is not allowed
                             if( strlen($password)<5 || strlen($password)>33) {
                                    $passworderror.="Password must be in between 4 to 32 letters <br>"; 
                                }
                    //validating image type 
                          if($_FILES["images"]["type"] == "image/png" || $_FILES["images"]["type"] == "image/jpg" || $_FILES["images"]["type"] == "image/jpeg" )
                                     {
                                        $imgerror1.= "";
                                     }
                                     else{
                                        $imgerror1.="JPEG, PNG, JPG 2MB max per image";
                                     }
                    //validating images size
                            if($_FILES["images"]["size"]>2097157 )
                                    {
                                            $imgerror2.="Images size must be 2MB ";
                                    }


                   }

//if any errors contain values then datas arent stored in database          
if($error=="" && $nameerror=="" && $emailerror=="" && $phoneerror==""  && $usernameerror=="" && $passworderror=="" && $imgerror1=="" && $imgerror2=="") {
    
                            $images="";
                                if(is_uploaded_file($_FILES["images"]['tmp_name'])) {
                                    move_uploaded_file($_FILES["images"]['tmp_name'],"../images/". $_FILES["images"]['name']);
                                $images = $_FILES["images"]['name'];
                                    }
                //insertin values in tbl_admin table
                    $sql="Insert into tbl_admin(`fname`,`lname`,`email`,`username`,`password`,`phone`,`address`,`join_date`,`images`) 
                                values('$fname','$lname','$email','$username',MD5('$password'),'$phone','$address','$date','$images')";
                        $result=mysqli_query($connection,$sql);//return     true or falseif($result) {
                                //displaying sucussful message
                                        
                    if($result){
                        ?>
                <div id="message-green">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="green-left">Admin added sucessfully. <a href="add_admin.php">Add new one.</a></td>
                            <td class="green-right">
                                <a class="close-green"><img src="../images/table/icon_close_green.gif" alt="" /></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
    } else {            //displaying error message
        ?>
                    <div id="message-red">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="red-left">Error. <a href="add_admin.php">Please try again.</a></td>
                                <td class="red-right">
                                    <a class="close-red"><img src="../images/table/icon_close_red.gif" alt="" /></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
            }
    }
}
?>

                        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                            <tr>
                                <th rowspan="3" class="sized"><img src="../images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                                <th class="topleft"></th>
                                <td id="tbl-border-top">&nbsp;</td>
                                <th class="topright"></th>
                                <th rowspan="3" class="sized"><img src="../images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
                            </tr>
                            <tr>
                                <td id="tbl-border-left"></td>
                                <td>
                                    <!--  start content-table-inner -->
                                    <div id="content-table-inner">

                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                            <tr valign="top">
                                                <td>

                                                    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' enctype='multipart/form-data'>
                                                        <!-- start id-form -->
                                                        <table border="0" cellpadding="0" cellspacing="0" id="id-form">
                                                            <tr>
                                                                <th valign="top">First Name:</th>
                                                                <td>
                                                                    <input type="text" name="fname" class="inp-form-error" /> &nbsp;&nbsp; <span class="error">* <?php echo $error; echo $nameerror; ?></span>
                                                            </tr>
                                                            </td>
                                                            <tr>
                                                                <th valign="top">Last Name:</th>
                                                                <td>
                                                                    <input type="text" name="lname" class="inp-form-error" />
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <th valign="top">Email:</th>
                                                                <td>
                                                                    <input type="text" name="email" class="inp-form-error" /> &nbsp;&nbsp; <span class="error">* <?php echo $error; echo $emailerror; ?></span></td>

                                                            </tr>
                                                            <tr>
                                                                <th valign="top">Username:</th>
                                                                <td>
                                                                    <input type="text" name="username" class="inp-form-error" /> &nbsp;&nbsp; <span class="error">* <?php echo $error; echo $usernameerror;?></span></td>

                                                            </tr>
                                                            <tr>
                                                                <th valign="top">Password:</th>
                                                                <td>
                                                                    <input type="password" name="password" class="inp-form-error" /> &nbsp;&nbsp; <span class="error">* <?php echo $error; echo $passworderror;?></span></td>

                                                            </tr>
                                                            <tr>
                                                                <th valign="top">Phone:</th>
                                                                <td>
                                                                    <input type="text" name="phone" class="inp-form-error" /> &nbsp;&nbsp; <span class="error">* <?php echo $error; echo $phoneerror;?></span></td>

                                                            </tr>
                                                            <tr>
                                                                <th valign="top">Address:</th>
                                                                <td>
                                                                    <input type="text" name="address" class="inp-form-error" />
                                                                </td>

                                                            </tr>


                                                            <tr>
                                                                <th>Image :</th>
                                                                <td>
                                                                    <input type="file" name="images" />&nbsp;&nbsp; <span class="error">* <?php echo $error; echo $imgerror1; echo $imgerror2; ?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <td valign="top">
                                                                    <input type="submit" value="" class="form-submit" />
                                                                    <input type="reset" value="" class="form-reset" />
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                    </form>




                                                    <form id="mainform" action="">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                                                            <tr>
                                                                <th class="table-header-check">
                                                                    <a id="toggle-all"></a>
                                                                </th>
                                                                <th class="table-header-repeat line-left"><a href="">Last Name</a> </th>
                                                                <th class="table-header-repeat line-left"><a href="">First Name</a></th>
                                                                <th class="table-header-repeat line-left"><a href="">Email</a></th>
                                                                <th class="table-header-repeat line-left"><a href="">username</a></th>
                                                                <th class="table-header-repeat line-left"><a href="">phone</a></th>
                                                                <th class="table-header-repeat line-left"><a href="">Address</a></th>
                                                                <th class="table-header-repeat line-left"><a href="">Date</a></th>
                                                                <th class="table-header-repeat line-left"><a href="">Images</a></th>
                                                                <th class="table-header-options line-left"><a href="">Options</a></th>
                                                            </tr>
                                                            <?php
                //selecting all  data from tbl_admin table  
                $admin="select * from tbl_admin";
                $result=mysqli_query($connection, $admin);
                if(mysqli_num_rows($result)>0) {
                    while ($row=mysqli_fetch_assoc($result)) {

                        //displaying all the necessary datas
        ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" />
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['fname']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['lname']?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="">
                                                                            <?=$row['email']?>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['username']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['phone']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['address']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['join_date']?>
                                                                    </td>
                                                                    <td><img src="../images/<?=$row['images']?>" height=50 width=50></td>
                                                                    <td style="width:5%;">
                                                                        <?php echo "<a href='edit_admin.php?id=$row[id]' title='Edit' class='icon-1 info-tooltip'></a>";?>
                                                                            <?php echo "<a href='delete_admin.php?id=$row[id]' title='Delete' class='icon-2 info-tooltip' onclick='return ConfirmDelete()'> </a>";?>


                                                                    </td>
                                                                </tr>

                                                                <?php
                }
            }

        ?>

                                                        </table>
                                                        <!--  end product-table................................... -->
                                                    </form>
                                    </div>
                                    <!--  end content-table  -->
   <?php

include '../includes/admin_footer.php';
?>