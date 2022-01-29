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
	
	    <style>
    .rankimg{
    width : 70px !important;
	height : 70px !important;
	border-radius : 35px !important;
    }
    
    </style>
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
						<li class="list-first"> <a href="#" ><i class="fa fa-phone "></i>  +919446555678</a> </li>
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
				<?php /*<li><a href="<?php echo base_url();?>welcome/products">Products</a></li>
				<li><a href="<?php echo base_url();?>welcome/repurchase_products">Repurchase Products</a></li>*/?>
				<li><a href="<?php echo base_url();?>welcome/contact_us">Contact Us</a></li>
				 <li class="dropdown active">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">about company <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url();?>welcome/about_us">About Us</a></li>
					<?php /*<li><a href="<?php echo base_url();?>welcome/legal">Legal</a></li>
					<li><a href="<?php echo base_url();?>welcome/grievance">Grievance</a></li>
					<li><a href="<?php echo base_url();?>welcome/plans">Business Plans</a></li>
					<li><a href="<?php echo base_url();?>welcome/training">Training and Events</a></li> */?>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
		</nav>
		<!---products heading-->
		<div class="col-xs-12 col-sm-12 col-md-12 product-head about-head">
			<div class="container">
				<h2>BUSINESS PLANS</h2>
			</div>
		</div>
		<!--about us-->
		<div class="col-xs-12 col-sm-12 col-md-12 contact-content plan-content">
			<div class="container">
				<h3>Types of Income</h3>
				<div class="row">
					<div class="col-xs-12 col-sm-6 icome-plan">
					<div>
						<h4>Direct Sales Incentive (D.S.I) daily </h4>
						<p>10% of the unlimited direct sales.</p>
					</div>
					</div>
					<div class="col-xs-12 col-sm-6 icome-plan">
					<div>
						<h4>Team Sales Incentive (T.S.I) daily</h4>
						<p>100BV : 100BV = RS. 1000/-</p>
						<p>Maximum pay out Rs. 10,000/- Per day </p>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 icome-plan">
					<div>
						<h4> Leader's Success Incentive (L.S.I) daily  </h4>
						<p>10% additional income of your direct referrals team sales incentive. </p>
					</div>
					</div>
					<div class="col-xs-12 col-sm-6 icome-plan">
					<div>
						<h4>  Re - purchase Income (R.P.I) monthly  </h4>
						<p>First time in the history of the multi level marketing a revolutionary move in Re&nbsp;-&nbsp;purchase. </p>
						<p>Re-purchase income is an unlimited residual income generated from 10  levels of your personally sponsored organizations.</p>
					</div>
					</div>
					
				</div>
				<div class="text-center row">
					<div class="col-xs-12  col-sm-6 icome-plan ">
					<div>
						<h4>Awards & Rewards</h4>
						<br>
						<a href="<?php echo base_url();?>images/pdf/ANVY_AWARDS&REWARDS.pdf" target="_blank" class="btn btn-info">VIEW NOW</a>
						<br>
						<br>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#rankModal">VIEW RANKS</i>
</button>
					</div>
					</div>
				</div>
			</div>
				
		</div>
		
		<div class="row-promotion bg-accent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                    	<div class="themesflat-spacer clearfix" style="height:24px"></div>

                                        <div class="themesflat-action-box style-1 has-icon ">
                                            <div class="inner">
                                        		<div class="heading-wrap">
                                        			<div class="text-wrap">
                                                        <span class="icon finance-icon-award"></span>
                                        				<h3 class="heading ">
                                        					DOWNLOAD E-BROCHURE NOW
                                        				</h3>
                                        				
                                        			</div>
                                        		</div>
                                        		<div class="button-wrap">
													<!--h3 class="heading " style="color:#fff;">
                                        					COMING SOON
                                        				</h3-->
                                        			<a href="<?php echo base_url();?>images/pdf/businessplan.pdf" target="_blank" class="themesflat-button white font-weight-600 margin-top-10 margin-bottom-13">DOWNLOAD NOW</a>
                                        		</div>
                                            </div>
                                        </div>

										<div class="themesflat-spacer clearfix" style="height:20px"></div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.contai-->
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
	
	
	
	
	<div class="modal fade" id="rankModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body model-pdt">
		<div class="row xrow1">
			<table class="table">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Rank</th>
						<th>Matching BV</th>
						<th>Badge</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>ANVY STAR</td>
						<td>500</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/star.jpg"></td>
					</tr>
					<tr>
						<td>2</td>
						<td>ANVY SILVER</td>
						<td>1000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/silver.jpg"></td>
					</tr>
					<tr>
						<td>3</td>
						<td>ANVY GOLD</td>
						<td>2500</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/gold.jpg"></td>
					</tr>
					<tr>
						<td>4</td>
						<td>ANVY PEARL</td>
						<td>5000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/pearl1.jpg"></td>
					</tr>
					<tr>
						<td>5</td>
						<td>ANVY EMERALD</td>
						<td>15000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/emerald.jpg"></td>
					</tr>
					<tr>
						<td>6</td>
						<td>ANVY PLATINUM</td>
						<td>30000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/platinum.jpg"></td>
					</tr>
					<tr>
						<td>7</td>
						<td>ANVY DIAMOND</td>
						<td>70000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/diamond.jpg"></td>
					</tr>
					<tr>
						<td>8</td>
						<td>ANVY DOUBLE DIAMOND</td>
						<td>150000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/double_diamond.jpg"></td>
					</tr>
					<tr>
						<td>9</td>
						<td>ANVY TRIPPLE DIAMOND</td>
						<td>300000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/triple_diamond.jpg"></td>
					</tr>
					<tr>
						<td>10</td>
						<td>ANVY BLUE DIAMOND</td>
						<td>750000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/blue_diamond.jpg"></td>
					</tr>
					<tr>
						<td>11</td>
						<td>ANVY ROYAL DIAMOND</td>
						<td>1500000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/royal_diamond.jpg"></td>
					</tr>
					<tr>
						<td>12</td>
						<td>ANVY CROWN DIAMOND</td>
						<td>4000000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/crown_diamond.jpg"></td>
					</tr>
					<tr>
						<td>13</td>
						<td>ANVY IMPERIAL CROWN DIAMOND</td>
						<td>10000000</td>
						<td><img class="rankimg" src="<?php echo base_url();?>Muser/images/rank/imperial_crown_diamond.jpg"></td>
					</tr>
					
					
				</tbody>
			</table>
			
		</div>
      </div>
      
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