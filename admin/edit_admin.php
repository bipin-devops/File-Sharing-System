
<?php
include("../includes/checkout-session.php");
include("../database/connection.php");

    $id = $_SESSION['user_id'];
    
    $sql = "select * from tbl_admin where id='$id'";
    $res = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($res);
   if ($row['superadmin']=='no') {
      header('location:dashboard.php');
   }
include '../includes/admin_header.php';

?>

<div class="clear"></div>

<!-- start content-outer -->
<div id="content-outer">
	<!-- start content -->
	<div id="content">


		<div id="page-heading"><h1>Add Admin</h1></div>

<?php
$id=$_GET['id'];
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
	


if(isset($_POST['fname'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$phone= $_POST['phone'];
	$address=$_POST['address'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$join_date=$year."-".$month."-".$day;
	

			
				   if ($fname=="" || $email=="" || $username=="" || $password=="" || $phone=="") {
				    $error.="Please fill all the required fields. <br> ";	
				   } else {

				     // check if name only contains letters and whitespace
						     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
						       		$nameerror = "Only letters and white space allowed"; 
						     	 }
						     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							       $emailerror = "Invalid email format"; 
							     }
							 if( !is_numeric($phone)) {
									$phoneerror.="Phone number must contains Numbers <br>";	
								}
							 if(strlen ($username)<5 || strlen($username)>33) {
									$usernameerror.="Username must be in between 4 to 32 letters <br>";	
								}
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

			
if($error=="" && $nameerror=="" && $emailerror=="" && $phoneerror==""  && $usernameerror=="" && $passworderror=="") {
	
							if(is_uploaded_file($_FILES["images"]['tmp_name'])) {
						move_uploaded_file($_FILES["images"]['tmp_name'],"../images/". $_FILES["images"]['name']);
						$images = $_FILES["images"]['name'];
					
						$sql =  " update tbl_admin set fname='$fname', lname ='$lname', email='$email', username='$username', password=md5('$password'),phone='$phone',address='$address',join_date='$join_date',images='$images' where id='$id' ";
						} else {
						$sql =  " update tbl_admin set fname='$fname', lname ='$lname', email='$email', username='$username', password=md5('$password'),phone='$phone',address='$address',join_date='$join_date' where id='$id' ";
						}
						$result=mysqli_query($connection,$sql);//return 	true or falseif($result) {
						?>
								<div id="message-green">
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td class="green-left">Admin Edited sucessfully. <a href="add_admin.php">Go Back.</a></td>
										<td class="green-right"><a class="close-green"><img src="../images/table/icon_close_green.gif"   alt="" /></a></td>
									</tr>
									</table>
								</div>
							<?php
	} else {
		?>
					<div id="message-red">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td class="red-left">Error. <a href="add_admin.php">Please try again.</a></td>
							<td class="red-right"><a class="close-red"><img src="../images/table/icon_close_red.gif"   alt="" /></a></td>
						</tr>
						</table>
					</div>	
<?php
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

									<form action='<?php $_SERVER["PHP_SELF"];?>' method='post' enctype='multipart/form-data'>
										<!-- start id-form -->
										<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
											<tr>
												<th valign="top">First Name:</th>
												<td><input type="text" name = "fname" class="inp-form-error" /> &nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $nameerror; ?></span>
											</tr></td>
											<tr>
												<th valign="top">Last Name:</th>
												<td><input type="text" name = "lname" class="inp-form-error" /></td>
												
											</tr>
											<tr>
												<th valign="top">Email:</th>
												<td><input type="text" name = "email" class="inp-form-error" /> &nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $emailerror; ?></span></td>
										
											</tr>
											<tr>
												<th valign="top">Username:</th>
												<td><input type="text"  name = "username" class="inp-form-error" /> &nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $usernameerror;?></span></td>
											
											</tr>
												<tr>
												<th valign="top">Password:</th>
												<td><input type="password"  name = "password" class="inp-form-error" /> &nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $passworderror;?></span></td>
											
											</tr>
											<tr>
												<th valign="top">Phone:</th>
												<td><input type="text" name = "phone" class="inp-form-error" /> &nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $phoneerror;?></span></td>
												
											</tr>
											<tr>
												<th valign="top">Address:</th>
												<td><input type="text" name = "address" class="inp-form-error" /></td>
												
											</tr>
											
											
											<tr>
													<th valign="top">Join date:</th>
													<td class="noheight">
													
														<table border="0" cellpadding="0" cellspacing="0">
														<tr  valign="top">
															<td>
															
															
															<select id="d" class="styledselect-day" name="day">
																<option value="">dd</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
																<option value="13">13</option>
																<option value="14">14</option>
																<option value="15">15</option>
																<option value="16">16</option>
																<option value="17">17</option>
																<option value="18">18</option>
																<option value="19">19</option>
																<option value="20">20</option>
																<option value="21">21</option>
																<option value="22">22</option>
																<option value="23">23</option>
																<option value="24">24</option>
																<option value="25">25</option>
																<option value="26">26</option>
																<option value="27">27</option>
																<option value="28">28</option>
																<option value="29">29</option>
																<option value="30">30</option>
																<option value="31">31</option>
															</select>
															</td>
															<td>
																<select id="m" class="styledselect-month" name="month">
																	<option value="">mmm</option>
																	<option value="1">Jan</option>
																	<option value="2">Feb</option>
																	<option value="3">Mar</option>
																	<option value="4">Apr</option>
																	<option value="5">May</option>
																	<option value="6">Jun</option>
																	<option value="7">Jul</option>
																	<option value="8">Aug</option>
																	<option value="9">Sep</option>
																	<option value="10">Oct</option>
																	<option value="11">Nov</option>
																	<option value="12">Dec</option>
																</select>
															</td>
															<td>
																<select  id="y"  class="styledselect-year" name="year">
																	<option value="">yyyy</option>
																	<option value="2005">2015</option>
																	<option value="2006">2016</option>
																	<option value="2007">2017</option>
																	<option value="2008">2018</option>
																	<option value="2009">2019</option>
																	<option value="2010">2020</option>
																</select>
																
															</td>
															<td><a href=""  id="date-pick"><img src="../images/forms/icon_calendar.jpg"   alt="" /></a></td>
														</tr>
														</table>
													
													</td>
													<td></td>
												</tr>
										<tr>
											<th>Image :</th>
											<td>  <input type="file" name = "images"  /> &nbsp;&nbsp;  <span class="error">* <?php echo $error; echo $imgerror1; echo $imgerror2; ?></span></td>
											
											</tr>
											<tr>
												<th>&nbsp;</th>
												<td valign="top">
													<input type="submit" value="" class="form-submit" />
													<input type="reset" value="" class="form-reset"  />
												</td>
												<td></td>
											</tr>
										</table>
									</form>




</div>


<?php
include '../includes/admin_footer.php';
?>