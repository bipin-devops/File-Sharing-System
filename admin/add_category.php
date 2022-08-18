<?php
include("../includes/checkout-session.php");
include ("../includes/admin_header.php");
include("../database/connection.php");

?>


    <div class="clear"></div>

    <!-- start content-outer -->
    <div id="content-outer">
        <!-- start content -->
        <div id="content">


            <div id="page-heading">
                <h1>Add Category</h1></div>


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


                                        <!--  start step-holder -->
                                        <div id="step-holder">
                                            <div class="step-no">1</div>
                                            <div class="step-dark-left"><a href="">Add Categories details</a></div>


                                            <div class="clear"></div>
                                        </div>

                                        <?php
	$title="";
	$description="";
	$error="";
	$nameerror="";
	$imgerror1="";
	$imgerror2="";
	

			$error="";
			if(isset($_POST['title'])){
				$title = $_POST["title"];
				$description=$_POST['description'];
			$date=date("Y-m-d");
				$images="";
				
				

				 if ($title=="" ) {
				    $error.="Please fill all the required fields. <br> ";	
				   } else {

				     // check if name only contains letters and whitespace
						     if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
						       		$nameerror = "Only letters and white space allowed"; 
						     	 }
					    	  if($_FILES["images"]["type"] == "image/png" || $_FILES["images"]["type"] == "image/jpg" || $_FILES["images"]["type"] == "image/jpeg" )
							     	 {
										$imgerror1.= "";
									 }
									 else{
									 	$imgerror1.="JPEG, PNG, JPG 2MB max per image";
									 }
					   		if($_FILES["images"]["size"]>2097157 )
									{
											$imgerror2.="Images size must be 2MB ";
									}
				   }
		
if($error=="" && $nameerror=="" && $imgerror1=="" && $imgerror2=="") {

					if(is_uploaded_file($_FILES["images"]['tmp_name'])) {

						move_uploaded_file($_FILES["images"]['tmp_name'],"../images/". $_FILES["images"]['name']);
						$images = $_FILES["images"]['name'];
						}
					
																			

				$sql="Insert into tbl_category(`title`,`description`,`upload_date`,`images`) 
					values('$title','$description','$date','$images')";
				$result=mysqli_query($connection,$sql);

			
			if($result)

			{ 
									?>
                                            <!-- start message-green -->
                                            <div id="message-green">
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="green-left">Category Added sucessfully <a href="add_category.php">Add Next one.</a></td>
                                                        <td class="green-right">
                                                            <a class="close-green"><img src="../images/table/icon_close_green.gif" alt="" /></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!--  end message-green -->
                                            <?php	
										} else{ 
									?>
                                                <!--  start message-red -->
                                                <div id="message-red">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td class="red-left">Error. <a href="add_category.php">Please try again.</a></td>
                                                            <td class="red-right">
                                                                <a class="close-red"><img src="../images/table/icon_close_red.gif" alt="" /></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--  end message-red -->
                                                <?php
										}
									

			}
		} 
	?>


                                                    <form action='<?php $_SERVER["PHP_SELF"];?>' method='post' enctype='multipart/form-data'>
                                                        <!-- start id-form -->
                                                        <table border="0" cellpadding="0" cellspacing="0" id="id-form">

                                                            <tr>
                                                                <th valign="top">Category Name:</th>
                                                                <td>
                                                                    <input type="text" name="title" class="inp-form-error" />&nbsp;&nbsp; <span class="error">* <?php echo $error; echo $nameerror;?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th valign="top">Description:</th>
                                                                <td>
                                                                    <textarea rows="" cols="" name="description" class="form-textarea"></textarea>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                           
                                                            <tr>
                                                                <th>Image (Cover) :</th>
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



                                                    <!--  start related-activities -->
                                                    <td>
                                                        <div id="related-activities">

                                                            <!--  start related-act-top -->
                                                            <div id="related-act-top">
                                                                <img src="../images/forms/header_related_act.gif" width="271" height="43" alt="" />
                                                            </div>
                                                            <!-- end related-act-top -->


                                                            <!--  start related-act-bottom -->
                                                            <div id="related-act-bottom">

                                                                <!--  start related-act-inner -->
                                                                <div id="related-act-inner">

                                                                    <div class="left">
                                                                        <a href=""><img src="../images/forms/icon_edit.gif" width="21" height="21" alt="" /></a>
                                                                    </div>
                                                                    <div class="right">
                                                                        <h5>View All Categories</h5>

                                                                        <ul class="greyarrow">

                                                                            <li><a href="view_category.php">Click here to View all Categories</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="lines-dotted-short"></div>

                                                                    <div class="left">
                                                                        <a href=""><img src="../images/forms/icon_plus.gif" width="21" height="21" alt="" /></a>
                                                                    </div>
                                                                    <div class="right">
                                                                        <h5>Add another Categories</h5>
                                                                        <ul class="greyarrow">
                                                                            <li><a href="add_category.php">Click here to add another Categories</a> </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="clear"></div>
                                                                    <div class="lines-dotted-short"></div>

                                                                    <div class="left">
                                                                        <a href=""><img src="../images/forms/icon_minus.gif" width="21" height="21" alt="" /></a>
                                                                    </div>
                                                                    <div class="right">
                                                                        <h5>Delete Categories</h5>

                                                                        <ul class="greyarrow">

                                                                            <li><a href="view_category.php">Click here to delete Categories</a> </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="clear"></div>
                                                                    <div class="lines-dotted-short"></div>



                                                                    <div class="left">
                                                                        <a href=""><img src="../images/forms/icon_edit.gif" width="21" height="21" alt="" /></a>
                                                                    </div>
                                                                    <div class="right">
                                                                        <h5>Edit categories</h5>

                                                                        <ul class="greyarrow">

                                                                            <li><a href="">Click here to Edit Categories</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="clear"></div>

                                                                </div>
                                                                <!-- end related-act-inner -->
                                                                <div class="clear"></div>

                                                            </div>
                                                            <!-- end related-act-bottom -->

                                                        </div>
                                                        <!-- end related-activities -->

                                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                                    <td></td>
                                </tr>
                            </table>

                            <div class="clear"></div>


                        </div>
                        <!--  end content-table-inner  -->
                        </td>
                        <td id="tbl-border-right"></td>
                </tr>
                <tr>
                    <th class="sized bottomleft"></th>
                    <td id="tbl-border-bottom">&nbsp;</td>
                    <th class="sized bottomright"></th>
                </tr>
            </table>

            <div class="clear">&nbsp;</div>

        </div>
        <!--  end content -->
        <div class="clear">&nbsp;</div>
    </div>
    <!--  end content-outer -->



    <div class="clear">&nbsp;</div>

    <?php
include '../includes/admin_footer.php';
?>