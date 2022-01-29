<?php

include 'sessioncheck.php';


$u_name="";
$u_address="";
$u_city="";
$u_state="";
$u_country="";
$u_pincode="";
$refid="";
$type="";
$u_phone="";

if(isset($_SESSION['uid'])){
$uid=$_SESSION['uid'];
$this->load->database();
$query=$this->db->query("select * from user_communication_details ucd,user_extradetails ue,user_login ul where ue.u_id=ucd.u_id and ue.u_id=ul.u_id and ucd.u_id='$uid';");
//echo $query->num_rows();
if($query->num_rows()>0)
{
	foreach ($query->result() as $row)
	{
		$u_name=$row->u_name;
		$u_address=$row->u_address;
		$u_city=$row->u_city;
		$u_state=$row->u_state;
		$u_country=$row->u_country;
		$u_pincode=$row->u_pincode;
		$refid=$row->u_referalid;
		$u_phone=$row->u_mobile;
		
	}
}
}
else if(isset($_REQUEST['refid']))
{
	$refid=$_REQUEST['refid'];
}

$prod=$_REQUEST['pd'];
$type=$_REQUEST['type'];
$size=$_REQUEST['s'];
$num=$_REQUEST['num'];
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
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	
<!-- default-css-files -->
<!-- font-awesome icons -->
<link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url();?>css/animate.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/owl.theme.default.min.css">
<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url();?>css/lightGallery.css" type="text/css" media="all" />
<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/style-new.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/products.css" rel='stylesheet' type='text/css' />
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
						<li class="list-first"> <a href="#" ><i class="fa fa-phone "></i> +919567530184</a> </li>
						<li class="list-second"> 
						  <a href="#"><i class="fa fa-envelope-o"></i> support@anvybusiness.com</a> 
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
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url();?>welcome/products">Products</a></li>
				<li  class="active"><a href="<?php echo base_url();?>welcome/repurchase_products">Repurchase Products</a></li>
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
		<!---products heading-->
		<div class="col-xs-12 col-sm-12 col-md-12 product-head">
			<div class="container">
				<h2>Repurchase Products</h2>
			</div>
		</div>
		<!-- cart-->
		<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart">
			<div class="container">
				<p><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart<span>[0]</span></a></p>
			</div>
		</div>-->
		<!---products content-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 prodt-details">
			<div class="container">
				<div class="col-xs-12 col-sm-12 delivery-address">
					<h3><i class="fa fa-map-marker"></i> delivery address</h3>
					  <div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" value="<?php echo $u_name;?>" placeholder="Name">
					  </div>
					   <div class="form-group">
						<label for="address">Phone</label>
						<input type="text" class="form-control" id="phone" value="<?php echo $u_phone;?>" placeholder="Phone">
					  </div>
					   <div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" id="address"  placeholder="Address"><?php echo $u_address;?></textarea>
					  </div>
					   <div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" value="<?php echo $u_city;?>" placeholder="City">
					  </div>
					   <div class="form-group">
						<label for="state">State</label>
						<input type="text" class="form-control" id="state" value="<?php echo $u_state;?>" placeholder="State">
					  </div>
					   <div class="form-group">
						<label for="pin">PIN Code</label>
						<input type="text" class="form-control" id="pin" value="<?php echo $u_pincode;?>" placeholder="PIN">
					  </div>
					   <div class="form-group">
						<label for="country">Country</label>
						<input type="text" class="form-control" id="country" value="<?php if($u_country!=""){echo $u_country;}else{echo "India";}?>" placeholder="Country">
					  </div>
					   <div class="form-group" style="margin-bottom:0px;">
						<input type="text" class="form-control" value="" id="errorrep" style="background:none;border:none;pointer-events:none;padding: 0px;height: 22px;color:red;text-align:center;"/>
					  </div>
					  
					  <button type="button" class="btn btn-danger btn-deliver" id="submit">Submit</button>
				</div>

				<input type="hidden" id="refid" value="<?php echo $refid;?>"/>
				<input type="hidden" id="prod" value="<?php echo $prod;?>"/>
				<input type="hidden" id="type" value="<?php echo $type;?>"/>
				
				<input type="hidden" id="num" value="<?php echo $num;?>"/>
				<input type="hidden" id="sze" value="<?php echo $size;?>"/>
				
			</div>
		</div>
		 <!--footer-->
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
							
							<li><i class="fa fa-phone" aria-hidden="true"></i>+919188767927 </li>
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
<script type="text/javascript" src="<?php echo base_url();?>js/ie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<![endif]-->        
<script>
	wow = new WOW({boxClass:'wow',animateClass: 'animated',offset: 0});
    new WOW().init();
</script>

				 
<script>
$(document).ready(function()
{
	var baseurl=getUrl();

	$("#submit").click(function()
	{
		$("#errorrep").val("");
	var name=$("#name").val();
	var address=$("#address").val();
	var city=$("#city").val();
	var state=$("#state").val();
	var pin=$("#pin").val();
	var country=$("#country").val();
	var refid=$("#refid").val();
	var prod=$("#prod").val();
	var type=$("#type").val();
	var sze=$("#sze").val();
	var num=$("#num").val();
	var phone=$("#phone").val();
        var phoneformat=/^\d{10}$/;	
	if(type==1){type=1;}else if(type==2){type=2;}else{type="";}

	if(name==""||address==""||city==""||state==""||pin==""||country==""||phone=="")
	{
		$("#errorrep").val("Enter All Fields");
	}
	else if(refid=="")
	{
		$("#errorrep").val("Referal Id Missing. Please Try Again");
	}
	else if(prod=="")
	{
		$("#errorrep").val("Error. No Product Selected");
	}
	else if(num=="")
	{
		$("#errorrep").val("Error. Qty Not Selected");
	}
// 	else if(sze=="")
// 	{
// 		$("#errorrep").val("Error. Size Not Selected");
// 	}
	else if(type=="")
	{
		$("#errorrep").val("Error. Something Went Wrong");
	}
    else if(!phone.match(phoneformat))
	{
		alertify.error("Invalid Phone Format");	
		//setTimeout(function() {$(".alertify-logs").remove();}, 1500);
		return false;
	}
	else{
		//alert(baseurl+"welcome/placeneworder?name="+name+"&address="+address+"&city="+city+"&state="+state+"&pin="+pin+"&country="+country+"&refid="+refid+"&prod="+prod+"&type="+type+"&phone="+phone);
		document.getElementById("submit").disabled = true;
		$.ajax({
		    type: "POST",
		    url: baseurl+"welcome/placeneworder",		 
		    dataType: "json",
		    data:{"name":name,"address":address,"city":city,"state":state,"pin":pin,"country":country,"refid":refid,"prod":prod,"type":type,"phone":phone,"num":num,"size":sze},
		    success: function(jsn) 
		    {
				//alert(jsn);
				if(jsn[0].res==0)
				{
					$("#errorrep").val("Order Could Not Be Placed. Please Try Again Later");
					document.getElementById("submit").disabled = false;
				}
				else{
					$("#errorrep").css("color","green");
					$("#errorrep").val("Your Order Has Been Placed");
					setTimeout(function(){window.location.href=baseurl+"welcome/repurchase_products";},1100);
				}
		     }
			 });
		}
	});
});
</script>

</body>
</html>
