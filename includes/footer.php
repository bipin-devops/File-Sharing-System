<!--footer-->
<div class="footer">
		<!-- container -->
		<div class="container">
			<div class="col-md-6 footer-left">
				<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="recent.php">Recent News</a></li>
						<li><a href="features.php">Most Features</a></li>
						<li><a href="category.php">More Topic</a></li>
						<li><a href="contact.php">Contact Us</a></li>

						
				</ul>

				<form action='<?php $_SERVER["PHP_SELF"];?>' method='post' >
					<input type="text" placeholder="Email" name= "email" required="">
					<input type="submit" value="Subscribe">
				</form>
			</div>
			<div class="col-md-3 footer-middle">
				<h3>Address</h3>
				<div class="address">
					<p>Kathmandu,thapathali.
						<span>Trade Tower, 3rd floor.</span>
					</p>
				</div>
				<div class="phone">
					<p>+977 98425-71729</p>
				</div>
			</div>
			<div class="col-md-3 footer-right">
				<h3>About Us</h3>
				<p>Founded in 2017 with the goal of making knowledge sharing easy,Build your knowledge quickly from concise, well-presented content from top experts.Get up to speed on any topic. You’ll find content from experts in every imaginable fields.</p>
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //container -->
	</div>
<!--/footer-->
<!--copy-rights-->
<div class="copyright">
		<!-- container -->
		<div class="container">
			<div class="copyright-left">
			<p>Copyright &copy;  Learn. All rights reserved | Design by <a href="https://week1to6.000webhostapp.com/" target="_blank">Aakash Pandey</a></p>
			</div>
			<div class="copyright-right">
				<ul>
					<li><a href="#" class="twitter"> </a></li>
					<li><a href="#" class="twitter facebook"> </a></li>
					<li><a href="#" class="twitter chrome"> </a></li>
					<li><a href="#" class="twitter pinterest"> </a></li>
					<li><a href="#" class="twitter linkedin"> </a></li>
					<li><a href="#" class="twitter dribbble"> </a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			
		</div>
		<!-- //container -->
		<!---->

		<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
	</div>
<!-- FlexSlider -->
<link href="../css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="../js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>
<!-- FlexSlider -->
	</body>
</html>
