<?php 
include 'sessioncheck.php';
include 'dbconnection.php';
?>


<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Anvy Business</title>
	<link rel="icon" href="<?php echo base_url();?>images/cropped-familydentfav-32x32.jpg" sizes="32x32">
	<link rel="icon" href="<?php echo base_url();?>images/cropped-familydentfav-192x192.jpg" sizes="192x192">
<!-- font -->
	<link href="<?php echo base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<!-- default-css-files -->
<!-- font-awesome icons -->
<link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url();?>css/lightGallery.css" type="text/css" media="all" />
<!-- //gallery -->


<!-- js -->
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- //js -->
<script type="text/javascript" src="<?php echo base_url();?>js/modernizr-2.6.2.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/owl.theme.default.min.css">
	<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/style-new.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/style5.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/resposive-layout.css" rel='stylesheet' type='text/css' />


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
						<li class="list-first"> <a href="#" ><i class="fa fa-phone "></i> +919567530184</a> </li>
						<li class="list-second"> 
						  <a href="mailto:support@massventureindia.com"><i class="fa fa-envelope-o"></i> support@anvybusiness.com</a> 
						</li>
				    </ul>				
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding header-s-part">
					<ul class="list-inline">
						<?php echo $logpanel;?>

						
					</ul>
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
				<li class="active"><a href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a></li>
				<li><a href="<?php echo base_url();?>welcome/products">Products</a></li>
				<li><a href="<?php echo base_url();?>welcome/repurchase_products">Repurchase Products</a></li>
				<li><a href="<?php echo base_url();?>welcome/contact_us">Contact Us</a></li>
				 <li class="dropdown">
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
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 products">
					<div id="banner-slider" class="owl-carousel owl-theme">
				
						
						<div class=" item" style="background-image:url('images/banner2.jpg')">
							<div class="banner-content">
								<h3>WELCOME TO</h3>
								<h2>ANVY BUSINESS SERVICES</h2>
								<p></p>
							</div>
						</div>
						<div class="item"style="background-image:url('images/banner1.jpg')">
							<div class="banner-content">
								<h3></h3>
								<h2>BE YOUR OWN BOSS</h2>
								<p>Join us to avail the best and quality products</p>
							</div>
						</div>
						<div class="item" style="background-image:url('images/banner4.jpg')">
							<div class="banner-content">
								<h3>YOU DESERVE TO BE REWARDED</h3>
								<h2>START EARNING TODAY</h2>
								
							</div>
						</div>
						<div class="item" style="background-image:url('images/banner3.jpg')">
							<div class="banner-content">
								<h3>TAKE HISTORY INTO OUR HANDS</h3>
								<h2>JOIN ANVY BUSINESS SERVICES</h2>
								<p>Explore the potential of the community commerce & online marketing industry</p>
							</div>
						</div>
						
					</div>
		</div>
        <!-- About Us-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about-us">
			<div class="container">
			<h2 class="sub-title">About <span>Anvy Business Services</span></h2>
				 <div class="diamond"></div>
                <div class="row">
                 
				
                
            	<div class="col-xs-12 col-sm-6 col-md-push-6 about-half-1">
                
                <p>Anvy Business Services(OPC) Pvt Ltd  has been established to accelerate the use of garments across the country.Anvy Business Services(OPC) Pvt Ltd has been in the field of garment making and marketing all over India for more than 8 years.
                Our own brands are Nexus, Nova and Madann cottons India.Proudly we ensure that we are specialist in 
                making shirts, T-shirts, Cotton pants because we  have the experience in this field with the highest quality.</p>
				<p>We at ANVY BUSINESS are determined to bring about a revolution in the Indian market so as to highlight the over all use of garments that have proven to be much more reliable and beneficial.</p>
                </div>
				 <div class="col-xs-12 col-sm-6 col-md-pull-6 about-half-2">
                	<img src="images/about123.jpeg" alt="">
                </div>
            </div>
            </div>
        </div>

		<!-- Acheivers-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 acheivers" style="padding:0px !important;">
			<div class="container">
				<h2 class="text-uppercase sub-title">Daily Top Achievers</h2>
				<div class="diamond"></div>
                
                <div id="daily_acheivers" style="padding: 0 15px 20px;" class="owl-carousel owl-theme">
						
				</div>
					
				</div>
				
			</div>





		<!-- Acheivers-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 acheivers">
			<div class="container">
				<h2 class="text-uppercase sub-title">Achievers</h2>
				<div class="diamond"></div>
                
                <div id="acheivers" class="owl-carousel owl-theme">

					<?php 
					
					$this->load->database();
					$query=$this->db->query("select * from achiver");
					//echo $query->num_rows();
					$cnt=0;
					if($query->num_rows()>0)
					{
						foreach ($query->result() as $row)
						{
							$name=$row->name;
							$comments=$row->comments;
							$image=$row->image;
						
							?>
							
							
								<div class="item">
									<div class="inner">
										<div class="thumb">
											<img src="images/acheivers/<?php echo $image."?". rand(0,1000);?>" alt="Image">
										</div>                                                        
										<blockquote class="text" >
											<div class="start">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
			
											</div>
											<p><?php echo $comments;?></p>
											<div class="name-pos">
												<h6 class="name"><?php echo strtoupper($name);?></h6>
												<!--<span class="position">Delicates Studio</span>-->
											</div>
										</blockquote>
									</div>
								</div>
							
							<?php
						
						}
					}
					
					?>
				</div>
					
				</div>
				
			</div>
		</div>
		<div class="row-promotion bg-accent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                    	<div class="themesflat-spacer clearfix"  style="height:24px"></div>

                                        <div class="themesflat-action-box style-1 has-icon ">
                                            <div class="inner">
                                        		<div class="heading-wrap">
                                        			<div class="text-wrap">
                                                        <span class="icon finance-icon-award"></span>
                                        				<h3 class="heading ">
                                        					START YOUR BUSINESS&nbsp;-&nbsp;PURCHASE YOUR CHOICE
                                        				</h3>
                                        				
                                        			</div>
                                        		</div>
                                        		<div class="button-wrap">
                                        			<a href="<?php echo base_url();?>welcome/login" class="themesflat-button white font-weight-600 margin-top-10 margin-bottom-13">LOGIN NOW</a>
                                        		</div>
                                            </div>
                                        </div>

										<div class="themesflat-spacer clearfix"  style="height:20px"></div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.contai-->
							</div>
		
						<div class="blog-area area-padding">
            <div class="container">
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-headline text-center">
                                <h2 class="text-uppercase sub-title">latest <span>news</span></h2>
								<div class="diamond"></div>
                                <p>ANVY BUSINESS offers high quality professional training, business building seminar events, and many other offers to their distributors.</p>
                            </div>
                        </div>
                    </div>
                <div class="row">
                	 <div class="single-blog col-xs-12 col-sm-6 col-md-4">
                                <div class="blog-image">
                                    <a class="" href="#">
                                        <img src="images/1.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="blog-content">
                                   <div class="blog-title" style="margin-top: 0">
                                       <!--<div class="blog-meta">
                                            <span class="date-type">
                                                20 june, 2017
                                            </span>
                                        </div>-->
                                        
                                            <h4>Anvy Business Services India Playstore App</h4>
                                    </div>
                                    <div class="blog-text">
                                        <p>The free online shopping app from Anvy Business Services assures you a great shopping experience.Download the Anvy Business Services shopping app for free from google playstore and enjoy online shopping like never before.<br><br>Use the link: <a href="https://play.google.com/store/apps/details?id=mv.mlm_app" target="_blank">https://play.google.com/store/apps/details?id=mv.mlm_app</a></p>
                                        
                                    </div>
                                </div>
                            </div>
					
                                
                         <div class="single-blog col-xs-12 col-sm-6 col-md-4">
                                <div class="blog-image">
                                    <a class="" href="#">
                                        <img src="images/13March.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            
                            
                            
                            <div class="single-blog col-xs-12 col-sm-6 col-md-4">
                                <div class="blog-image">
                                    <a class="" href="#">
                                        <img src="images/17feb5.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            
					
				<!--<img src="images/coming_soon.png" class="coming">
                   <div class="blog-grid home-blog">
                       <div id="news" class="owl-carousel owl-theme">
				
						<div class="item">
						 <div class="single-blog">
                                <div class="blog-image">
                                    <a class="image-scale" href="#">
                                        <img src="images/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                   <div class="blog-title">
                                       <div class="blog-meta">
                                            <span class="date-type">
                                                20 june, 2017
                                            </span>
                                        </div>
                                        
                                            <h4>Business manegment</h4>
                                    </div>
                                    <div class="blog-text">
                                        <p>Redug Lagre dolor sit amet, consectetur adipisicing elit. Minima in nostrum, veniam. Esse est assumenda inventore.</p>
                                        
                                    </div>
                                </div>
                            </div>
						</div>
						
						 <!--<div class="item">
						 <div class="single-blog">
                                <div class="blog-image">
                                    <a class="image-scale" href="#">
                                        <img src="images/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                   <div class="blog-title">
                                       <div class="blog-meta">
                                            <span class="date-type">
                                                20 june, 2017
                                            </span>
                                        </div>
                                        
                                            <h4>Business manegment</h4>
                                    </div>
                                    <div class="blog-text">
                                        <p>Redug Lagre dolor sit amet, consectetur adipisicing elit. Minima in nostrum, veniam. Esse est assumenda inventore.</p>
                                        
                                    </div>
                                </div>
                            </div>
						</div>
						
						
						<div class="item">
						 <div class="single-blog">
                                <div class="blog-image">
                                    <a class="image-scale" href="#">
                                        <img src="images/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                   <div class="blog-title">
                                       <div class="blog-meta">
                                            <span class="date-type">
                                                20 june, 2017
                                            </span>
                                        </div>
                                        
                                            <h4>Business manegment</h4>
                                    </div>
                                    <div class="blog-text">
                                        <p>Redug Lagre dolor sit amet, consectetur adipisicing elit. Minima in nostrum, veniam. Esse est assumenda inventore.</p>
                                        
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="item">
						 <div class="single-blog">
                                <div class="blog-image">
                                    <a class="image-scale" href="#">
                                        <img src="images/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                   <div class="blog-title">
                                       <div class="blog-meta">
                                            <span class="date-type">
                                                20 june, 2017
                                            </span>
                                        </div>
                                        
                                            <h4>Business manegment</h4>
                                    </div>
                                    <div class="blog-text">
                                        <p>Redug Lagre dolor sit amet, consectetur adipisicing elit. Minima in nostrum, veniam. Esse est assumenda inventore.</p>
                                        
                                    </div>
                                </div>
                            </div>
						</div>-->
						
						
					</div>
                      
                    </div>
                </div>
                <!-- End row -->
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
				<p>  © Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a></p>
			</div>
		</div>
	</div>



<!-- footer section -->
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.zoomslider.min.js"></script>
		
					
				  <!-- start-smoth-scrolling -->
				<script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
				<script type="text/javascript">
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
<script src="<?php echo base_url();?>js/owl.carousel.js"></script>
<script src="<?php echo base_url();?>js/wow.min.js"></script>
<!--[if IE]>
<script type="text/javascript" src="js/ie.js"></script>
<![endif]-->        
<script>
$(document).ready(function() {
	var cont = 0;
	
  $('#acheivers').owlCarousel({
	margin:15,
	items : 3,
	loop:true,
	nav:false,
	autoplay:true,
	dots:false,
	autoplayTimeout:2000,
	autoplayHoverPause:true,
	responsive: {
	  0: {
		items: 1,
		margin:15
	  },
	  601: {
		items: 2
	  },
	  992: {
		items: 3
	  }
	 
	}
  });
  var owl = $('#acheivers');




// Listen to owl events:
   $('#news').owlCarousel({
	margin:15,
	items : 3,
	loop:true,
	nav:false,
	autoplay:true,
	dots:false,
	autoplayTimeout:2000,
	autoplayHoverPause:true,
	responsive: {
	  0: {
		items: 1
	  },
	  601: {
		items: 2
	  },
	  992: {
		items: 3
	  }
	 
	}
  });
  $('#banner-slider').owlCarousel({
	margin:0,
	items : 1,
	loop:true,
	nav:false,
	autoplay:true,
	animateIn: 'fadeIn',
	 animateOut: 'fadeOut',
	autoplayTimeout:3000
  });
  $(window).scroll(function()
  {
	  var x= $(".about-us").offset().top;
	  if($(this).scrollTop()>x && cont==0)
	  {
		  $('.accent').each(function () {
			$(this).prop('Counter',0).animate({
				Counter: $(this).text()
			}, {
				duration: 9000,
				easing: 'swing',
				step: function (now) {
					$(this).text(Math.ceil(now));
				}
			});
		});
		cont++;
	  }
  });
})
</script>
<script>
	wow = new WOW({boxClass:'wow',animateClass: 'animated',offset: 0});
    new WOW().init();
</script>

<script>

$(document).ready(function(){
	var base_url= "<?php echo base_url();?>";
	$.getJSON(base_url+"welcome/daily_acheivers",function(jsn)
			{
				$("#daily_acheivers").html("");
				if(jsn.length>0){
					for (var i=0;i<jsn.length;++i){
					var name=jsn[i].name;
					try{var income=parseFloat(jsn[i].income).toFixed(2);
					}
					catch(e){
						var income=jsn[i].income;
					}
					var image=jsn[i].image;
					
					var val='<div class="item">'+
            					'<div class="inner">'+
            					'<div class="thumb">'+
            						'<img src="images/daily_acheivers/'+image+'?" alt="Image">'+
            					'</div>'+                                                    
            					'<blockquote class="text" >'+
            						
            						'<div class="name-pos">'+
            							'<h6 class="name">'+name.toUpperCase()+'</h6>'+
            						'</div>'+
            						'<h4>Income: Rs. '+income+'</h4>'+
            					'</blockquote>'+
            				'</div>'+
            			'</div>';
					$("#daily_acheivers").append(val);
				}

				$('#daily_acheivers').owlCarousel({
							margin:15,
							items : 3,
							loop:true,
							nav:false,
							autoplay:true,
							dots:false,
							autoplayTimeout:2000,
							autoplayHoverPause:true,
							responsive: {
							  0: {
								items: 1,
								margin:15
							  },
							  601: {
								items: 2
							  },
							  992: {
								items: 3
							  }
							 
							}
						  });
			}
			});
});

</script>	 


</body>
</html>
