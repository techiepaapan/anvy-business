<?php 
include 'sessioncheck.php';
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta Name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>
	<link rel="icon" href="<?php echo base_url();?>images/cropped-familydentfav-32x32.jpg" sizes="32x32">
	<link rel="icon" href="<?php echo base_url();?>images/cropped-familydentfav-192x192.jpg" sizes="192x192">
<!-- font -->
	<link href="<?php echo base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css' />
	
<!-- default-css-files -->
<!-- font-awesome icons -->
<link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url();?>css/lightGallery.css" type="text/css" media="all" />
<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/style-new.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/products.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/style5.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/resposive-layout.css" rel='stylesheet' type='text/css' />
<!-- //gallery -->


<!-- js -->
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- //js -->
<script type="text/javascript" src="<?php echo base_url();?>js/modernizr-2.6.2.min.js"></script>
<!-- Script-for-nav-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //Script-for-nav-scrolling -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="outer">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top-header">
			<div class="container">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding header-f-part">
					<ul class="list-inline">
						<li class="list-first"> <a href="#" ><i class="fa fa-phone "></i>  +919567530184</a> </li>
						<li class="list-second"> 
						  <a href="#"><i class="fa fa-envelope-o"></i> support@anvybusiness.com</a> 
						</li>
				    </ul>				
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding header-s-part">
					<ul class="list-inline">
						<?php echo $logpanel;?>
						
				</div>
			</div>
		</div>
		<!-- navigation section-->
		<nav class="navbar navbar-default">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			   <h1><a class="navbar-brand" href="<?php echo base_url();?>">
		  <img src="<?php echo base_url();?>/images/logo.png" >
		  ANVY BUSINESS</a></h1>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			 
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url();?>welcome/products">Products</a></li>
				<li><a href="<?php echo base_url();?>welcome/repurchase_products">Repurchase Products</a></li>
				<li><a href="<?php echo base_url();?>welcome/contact_us">Contact Us</a></li>
				 <li class="dropdown active">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">about company <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url();?>welcome/about_us">About Us</a></li>
					<li><a href="<?php echo base_url();?>welcome/legal">Legal</a></li>
					<li><a href="<?php echo base_url();?>welcome/grievance">Grievance</a></li>
					<li><a href="<?php echo base_url();?>welcome/plans">Business Plans</a></li>
					<li><a href="<?php echo base_url();?>welcome/training">Training and Events</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
		</nav>
		<!---products heading-->
		<div class="col-xs-12 col-sm-12 col-md-12 product-head about-head">
			<div class="container">
				<h2>GRIEVANCE</h2>
			</div>
		</div>
		<!--about us-->
		<div class="col-xs-12 col-sm-12 col-md-12 contact-content grievancee">
			<div class="container">
					<form class="form_width">
					  <div class="form-group">
						<label for="name"> Name</label>
						<input type="text" class="form-control" id="name">
					  </div>
					  <div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" id="phone">
					  </div>
					   <div class="form-group">
						<label for="userid">User ID</label>
						<input type="text" class="form-control" id="userid">
					  </div>
					  <div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email">
					  </div>
					  
					  <div class="form-group">
						<label for="complaint">Complaint</label>
						<textarea class="form-control" id="complaint" rows="4"></textarea>
					  </div>
					  
					  <button type="submit" class="btn btn-default btn-block">Submit</button>
					</form>	
				</div>
		</div>
		<?php include 'buisenq.php'?>
		 <!--footer
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3 footer-sub footer-about">
						<h4>ABOUT US</h4>
						<p>Inorder to bring a revolution in garment making and marketing across the country,our company has been established with an experience more than 8 years in the field of making shirts,T-shirts,Cotton Pants.</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 footer-sub footer-address ">
						<h4>GET IN TOUCH</h4>
						<ul>
							
							<li><i class="fa fa-phone" aria-hidden="true"></i>04712570571 </li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i> support@massventureindia.com</li>
							<ul>
							<div class=" footer-follow">
							<ul>
							<li class="facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
							</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 footer-sub footer-follow footer-follow1">
					<h4>BUSINESS ENQUIRY</h4>
						<div class="row">
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Name">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Email">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Phone Number">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Place">
							</div>
							<div class="col-xs-12">
								<button type="button" class="btn btn-block btn-default">Submit</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		
		<!--footer end-->
		<div class="col-xs-12 col-sm-12 col-md-12 footer-copyright">
			<div class="container">
				<p>  © 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a></p>
			</div>
		</div>
	</div>


<!-- footer section -->
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.zoomslider.min.js"></script>
		
					
				  <!-- start-smoth-scrolling -->
				<script type="<?php echo base_url();?>text/javascript" src="js/move-top.js"></script>
				<script type="<?php echo base_url();?>text/javascript" src="js/easing.js"></script>
				<script type="<?php echo base_url();?>text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<!-- start-smoth-scrolling -->
		<!-- smooth scrolling-bottom-to-top -->
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
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<script src="<?php echo base_url();?>js/SmoothScroll.min.js"></script>

		<!-- //smooth scrolling-bottom-to-top -->
	<!--js for bootstrap working-->
	<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script src="<?php echo base_url();?>js/wow.min.js"></script>
<!--[if IE]>
<script type="text/javascript" src="js/ie.js"></script>
<![endif]-->        

<script>
	wow = new WOW({boxClass:'wow',animateClass: 'animated',offset: 0});
    new WOW().init();
</script>

				 


</body>
</html>
