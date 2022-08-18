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

           <?php
                $file_name="";
                $description="";
                $error="";
                $nameerror="";
                $imgerror1="";
                $imgerror2="";
                $fileerror1="";
                $fileerror2="";
               

            if(isset($_POST['file_name'])){
                $file_name=$_POST['file_name'];
                $cat = $_POST['cat'];
                $description=$_POST['description'];
                //$day=$_POST['day'];
                //$month=$_POST['month'];
                //$year=$_POST['year'];
                $upload_date=date("Y-m-d");
                $userid= $_SESSION['userid'];
                                //validation, checking whether the user input is empty or not
                   if ($file_name=="" || $description=="" ) {
                    $error.="Please fill all the required fields. <br> ";   
                   } else {

                     // check if name only contains letters and whitespace
                             if (!preg_match("/^[a-zA-Z ]*$/",$file_name)) {
                                    $nameerror = "Only letters and white space allowed"; 
                                 }
                        //validating file type
                        if($_FILES["files"]["type"] == "application/pdf" || $_FILES["files"]["type"] == "application/ppt" || $_FILES["files"]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation" || $_FILES["files"]["type"] == "application/doc" || $_FILES["files"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" )
                           {  
                            $fileerror1.= "";
                           }
                         else{
                            $fileerror1.="PPT, PDF, DOCX 5MB max per Files";
                           }
                      //validating file size
                            if($_FILES["files"]["size"]>5242880 )
                              {
                               $fileerror2.="files size must be 2MB ";
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
if($error=="" && $nameerror=="" && $imgerror1=="" && $imgerror2=="" && $fileerror1=="" && $fileerror2==""  ) 
{


                $files="";
    
                    if(is_uploaded_file($_FILES["files"]['tmp_name'])) {
                        move_uploaded_file($_FILES["files"]['tmp_name'],"../upload_file/". $_FILES["files"]['name']);
                        $files = $_FILES["files"]['name'];
                    }

                $images="";
    
                    if(is_uploaded_file($_FILES["images"]['tmp_name'])) {
                        move_uploaded_file($_FILES["images"]['tmp_name'],"../images/". $_FILES["images"]['name']);
                        $images = $_FILES["images"]['name'];
                    }

                $sql="Insert into tbl_file(`user_id`,`cat_id`,`file_name`,`description`,`upload_date`,`files`,`images`) 
                                                            values('$userid','$cat','$file_name','$description','$upload_date','$files','$images')";
               
                 $result=mysqli_query($connection,$sql);

                   if($result){
                ?>
             <div class="alert alert-dismissible admission-alert success" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button><br>
                           Congratulation !! File Uploaded Successfully 
                    </div>
                   <?php
                    }
        }
        else{
                        ?>
               <div class="alert alert-dismissible admission-alert danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button>
                            <i style="font-size:1.55em;"><?php echo $error; echo $nameerror; echo $imgerror1; echo $imgerror2; echo $fileerror1; echo $fileerror2;  ?></i><a style="font-size:1.55em;" href="upload.php"> Please Re-try</a>
                    </div> 

                        <?php
                        }

              }
    ?>	
	   <div class="container">



<div class="upload">
    <h3>UPLOAD A FILE</h3>
  <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' enctype='multipart/form-data'>
    <label for="category">Category</label>
    <select id="country" name="cat">
         <?php
                                                        $sql = "SELECT * FROM tbl_category";
                                                        $cat = mysqli_query($connection, $sql);
                                                        
                                                        while($row=mysqli_fetch_assoc($cat)) {
                                                        ?>

                                                        <option value="<?=$row['id']?>"><?=$row['title']?></option>
                                                        <?php 
                                                            }
                                                        ?>
    </select>
    <label for="fname">File Name *   </label>
    <input type="text" name="file_name">
    <label for="description">Description *   </label>
     <textarea name="description"> </textarea>
   <br>
    <b style="font-size:1em;color:gray;"> Image : </b><input style="margin-right:40%;" type="file" name="images"><br><br>
    <b style="font-size:1em;color:gray;">File : </b><input style="margin-right:40%;"  type="file" name="files"><br><br>
    <input type="submit" value="Upload">
  </form>
</div>

	</div>
  <?php
include '../includes/footer.php';
?>