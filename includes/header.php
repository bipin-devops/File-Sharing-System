<!DOCTYPE HTML>
<html>
<head>
<title>Learn - The Best Education site</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery/jquery.min.js"></script>
<script src="../js/jquery/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />


<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>

<link href="../css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<!----Calender -------->
  <link rel="stylesheet" href="../css/clndr.css" type="text/css" />
  <script src="../js/jquery/underscore-min.js" type="text/javascript"></script>
  <script src= "../js/jquery/moment-2.2.1.js" type="text/javascript"></script>
  <script src="../js/jquery/clndr.js" type="text/javascript"></script>
  <script src="../js/jquery/site.js" type="text/javascript"></script>
<!----End Calender -------->

<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}


input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>


</head>

<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <a class="navbar-brand" href="index.html">Learn</a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
	        	 
		        

		        <?php if(isset($_SESSION['username'])) {
				//echo($_SESSION['username']);
				?> 
			 <li >
			 <div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><i class="fa fa-user"></i><span><?php echo($_SESSION['username']);?></span></button>
  <div id="myDropdown" class="dropdown-content">
   <a href="my_profile.php" class="fa fa-user" >    View Profile</a>
   <a href="change_password.php" class="fa fa-edit">    Change Password</a>

  </div>
</div>


		        
		        </li>
				<li class="dropdown">
		        	<a href="upload.php"><i class="fa fa-upload"></i><span>Upload</span></a>
		        </li>
				 <li class="dropdown">
		            <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
		        </li>
		        
				<?php 
					} else 
					{
				 ?>
		          
		          <li class="dropdown">
		            <a href="login.php"><i class="fa fa-sign-in"></i><span>Login</span></a>
		       	 </li>
		       
		        <?php 
		    		}
		         ?>
		      
				
		        <li class="dropdown">
<form method="get" action="search.php">
  <input type="text" name="s" placeholder="Search..">
</form>

		            <
		        </li>
		    </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
</nav>

   <!-- Collect the nav links, forms, and other content for toggling -->
  
	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs" >
        <ul class="nav navbar-nav nav_1">
            <li><a href="index.php">Home</a></li>
            <li><a href="recent.php">Recent News</a></li>
            <li><a href="features.php">Most Features</a></li>
            <li><a href="category.php">More Topic</a></li>
            
        </ul>
     </div><!-- /.navbar-collapse -->
   </div>
</nav>