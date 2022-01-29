<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta Name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title></title>
	<link rel="icon" href="images/cropped-familydentfav-32x32.jpg" sizes="32x32">
	<link rel="icon" href="images/cropped-familydentfav-192x192.jpg" sizes="192x192">
	<!-- font -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

	<!-- default-css-files -->
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- gallery -->
	<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/style-new.css" rel='stylesheet' type='text/css' />
	<link href="css/products.css" rel='stylesheet' type='text/css' />
	<!-- //gallery -->


	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<!-- //js -->
	<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
	<!-- Script-for-nav-scrolling -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
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
						<li class="list-first"> <a href="#"><i class="fa fa-phone "></i> +919188767927</a> </li>
						<li class="list-second">
							<a href="#"><i class="fa fa-envelope-o"></i> support@massventureindia.com</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding header-s-part">
					<ul class="list-inline">
						<li class="list-first">
							<a href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
						</li>
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
					<h1><a class="navbar-brand" href="index.html">ANVY BUSINESS</a></h1>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url(); ?>">Home </a></li>
						<li><a href="<?php echo base_url(); ?>welcome/about_us">About Us</a></li>
						<li><a href="<?php echo base_url(); ?>welcome/products">Products</a></li>
						<li><a href="<?php echo base_url(); ?>welcome/repurchase_products">Repurchase Products</a></li>
						<li><a href="<?php echo base_url(); ?>welcome/contact_us">Contact Us</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
		<!---products heading-->
		<div class="col-xs-12 col-sm-12 col-md-12 product-head">
			<div class="container">
				<h2>repurchase Products</h2>
			</div>
		</div>
		<!-- cart-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart">
			<div class="container">
				<p><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart<span>[0]</span></a></p>
			</div>
		</div>
		<!---products content-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 prodt-details">
			<div class="container">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><input type="checkbox"> All</th>
								<th>Item</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row"><input type="checkbox"></th>
								<td><img src="images/product.jpg" alt="" class="tbl-pdt-sm">Asus Zenfone Max ZC550KL (Black, 16GB) </td>
								<td><input type="text" class="tbl-txt-sm"></td>
								<td><span class="price-ttl">RS.139999.00</span></td>
								<td><span class="price-ttl">RS.139999.00</span></td>
							</tr>
							<tr>
								<th scope="row"><input type="checkbox"></th>
								<td><img src="images/product.jpg" alt="" class="tbl-pdt-sm">Asus Zenfone Max ZC550KL (Black, 16GB) </td>
								<td><input type="text" class="tbl-txt-sm"></td>
								<td><span class="price-ttl">RS.139999.00</span></td>
								<td><span class="price-ttl">RS.139999.00</span></td>
							</tr>
							<tr>
								<th scope="row"><input type="checkbox"></th>
								<td><img src="images/product.jpg" alt="" class="tbl-pdt-sm">Asus Zenfone Max ZC550KL (Black, 16GB) </td>
								<td><input type="text" class="tbl-txt-sm"></td>
								<td><span class="price-ttl">RS.139999.00</span></td>
								<td><span class="price-ttl">RS.139999.00</span></td>
							</tr>
						</tbody>
						<tfoot>
							<tr class="subttl">
								<td colspan="5">
									<p>Subtotal (<span class="qnty-ttl">1</span> item):<i class="fa fa-inr" aria-hidden="true"></i> <span class="prc-ttl">10,524.00</span></p>
								</td>
							</tr>
						</tfoot>
					</table>
					<div class="buttons">
						<a href="#"><button class="but-buy-now " data-toggle="modal" data-target="#myModal"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Buy Now</button></a>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3 footer-sub footer-about">
						<h4>ABOUT US</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatem maiores eaque similique non distinctio voluptates perspiciatis omnis, repellendus ipsa aperiam, laudantium voluptatum nulla Lorem ipsum dolor sit amet, consectetur
							adipisicing elit.perspiciatis</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 footer-sub footer-address">
						<h4>GET IN TOUCH</h4>
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>Lane 22 Hose jsdjs </li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>123-123-32122 </li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i>comtact@domaunname.com</li>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 footer-sub footer-links">
						<h4>QUICK LINKS</h4>
						<ul>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Home</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>About Us</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Products</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Repurchase Products</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Contact Us</a></li>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 footer-sub footer-follow">
						<h4>FOLLOW US</h4>
						<ul>
							<li class="facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</div>
				</div>
			</div>
		</div>

		<!--footer end-->
		<div class="col-xs-12 col-sm-12 col-md-12 footer-copyright">
			<div class="container">
				<p> © 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a></p>
			</div>
		</div>
	</div>


	<!-- footer section -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body ">
					<div class="row">
						<div class="col-xs-12 col-sm-12 buyy-now">
							<div>
								<h5>New Member ?</h5>
								<p class="error-msg">Some error has been occured</p>
								<div class="form-group">
									<label for="refferal-id" class="control-label">Referral Id:</label>
									<input type="text" class="form-control" id="refferal-id" placeholder="Enter Referral Id ...">
								</div>
								<button type="submit" class="btn btn-primary login">PROCEED</button>
								<div class="col-xs-12 col-sm-12 col-md-12 or">
									<div class="or1">
										or
									</div>
								</div>

								<h5>Already Registered ? Login Now</h5>
								<p class="error-msg">Some error has been occured</p>
								<div class="form-group">
									<label for="username" class="control-label">Username:</label>
									<input type="text" class="form-control" id="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="password" class="control-label">Password:</label>
									<input type="password" class="form-control" id="password" placeholder="*******">
								</div>
								<button type="submit" class="btn btn-danger login1">Login</button>

								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>


	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
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
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<script src="js/SmoothScroll.min.js"></script>

	<!-- //smooth scrolling-bottom-to-top -->
	<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<script src="js/owl.carousel.js"></script>
	<script src="js/wow.min.js"></script>
	<!--[if IE]>
<script type="text/javascript" src="js/ie.js"></script>
<![endif]-->
	<script>
		$(document).ready(function() {
			$(document).on("keydown", ".tbl-txt-sm", function(e) {
				// Allow: backspace, delete, tab, escape, enter
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
					// Allow: Ctrl+A, Command+A
					(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
					// Allow: home, end, left, right, down, up
					(e.keyCode >= 35 && e.keyCode <= 40)) {
					// let it happen, don't do anything
					return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});
		})

		wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0
		});
		new WOW().init();
	</script>




</body>

</html>