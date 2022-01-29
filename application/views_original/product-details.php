<?php
include 'sessioncheck.php';
error_reporting(0);
if(isset($_REQUEST['pd']))
{
	if($_REQUEST['pd']==""){header('location:'.base_url().'welcome/repurchase_products');}
	else{$pid=$_REQUEST['pd'];}
}
else
{
	header('location:'.base_url().'welcome/repurchase_products');
}


$this->load->database();
$query=$this->db->query("select * from repurchase_product where re_product_id='$pid';");
//echo $query->num_rows();
if($query->num_rows()>0)
{
	foreach ($query->result() as $row)
	{
		$product_name=$row->product_name;
		$product_description=$row->product_description;
		$product_price=$row->product_price;
		$product_code=$row->product_code;
		$discount_price=$row->product_discount;
		$pro_qty=$row->product_qty;
		$image1=$row->image1;
		$image2=$row->image2;
		$image3=$row->image3;
		$image4=$row->image4;
		
	}
}
else {
	header('location:'.base_url().'welcome/repurchase_products');
}

if($discount_price<=0)
{
	$anydisc='<i class="fa fa-inr" aria-hidden="true"></i> '.$product_price;
}
else {
	$nprice=$product_price-$discount_price;
	$anydisc='<i class="fa fa-inr" aria-hidden="true"></i> '.$nprice.' <div><s style="font-size: 12px;color: gray;"><i class="fa fa-inr" aria-hidden="true"></i>'.$product_price.'</s></div>';
}

if($pro_qty<=0)
{
	$stock='<p style="color:red;" id="proqtys" value="'.$pro_qty.'">Out Of Stock</p>';
}
else 
{
	$stock='<p style="color:green;" id="proqtys" value="'.$pro_qty.'">In Stock</p>';
	
}
//echo $anydisc;
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
						<li class="list-first"> <a href="#" ><i class="fa fa-phone "></i> +919567530184</a> </li>
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
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cart">
			<div class="container">
				<!-- <p><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart<span>[0]</span></a></p>-->
			</div>
		</div>
		<!---products content-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 prodt-details">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 cart-slider">
					<div class="slider">
						<div id="products" class="owl-carousel owl-theme">
							<div class=" item">
								<img src="<?php echo base_url();?>Madmin/uploads/<?php echo $image1;?>" alt="...">
							</div>
							<div class=" item">
								<img src="<?php echo base_url();?>Madmin/uploads/<?php echo $image2;?>" alt="...">
							</div>
							<div class=" item">
								<img src="<?php echo base_url();?>Madmin/uploads/<?php echo $image3;?>" alt="...">
							</div>
							<div class=" item">
								<img src="<?php echo base_url();?>Madmin/uploads/<?php echo $image4;?>" alt="...">
							</div>
						</div>
					</div>
					<div class="buttons">
						<!-- <a href="#"><button class="but-add-cart "><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Add to Cart</button></a>-->
						<button class="but-buy-now" id="buynow" value="<?php echo $lg;?>" style="margin-left: 0px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Buy Now</button>
					</div>
					<button data-toggle="modal" data-target="#myModal" id="buynowlogin" style="visibility:hidden;"/>
					
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 cart-cnt">
						<h3 class="products-hh"><?php echo $product_name;?></h3>
						<h4 class="pdt-pce"><?php echo $anydisc;?></h4>
						<p class="product-id"><span>Product Id</span><?php echo $product_code;?></p>
						
						
						
								
								
								<?php 
								$query=$this->db->query("select * from repurchase_size where re_product_id='$pid';");
//echo $query->num_rows();
								if($query->num_rows()>0)
								{
									?>
									<p class="product-id"><span>Size </span>
									<select id="prosize">
									<?php
									foreach ($query->result() as $row)
									{
										$size_name=$row->size;
										$size_id=$row->size_id;
										?>
										<option value="<?php echo $size_id;?>"><?php echo $size_name;?></option>
										<?php
									}
								}
								else
								{
									?>
									<p class="product-id" style="display:none;"><span>Size </span>
									<select id="prosize" >
									<option value="">Select</option>
									<?php 
								}
								
								?>
						</select>
						</p>
						<p class="product-id"><span>Qty </span>
							<input type="number" style="width:70px;" id="pronum" min="1" value="1" max="<?php echo $pro_qty;?>" >
						</p>
						
						<p> <?php echo $product_description;?> <p>
                        <h5><?php echo $stock;?></h5>
                        
                        <p class="error-msg" style="color:red;" id="referrors"></p>
					</div>
				</div>
			</div>
		</div>
		<?php //echo $anydisc." - ".$discount_price;?>
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
<p class="error-msg" id="referror"></p>
		<!--<h5>New Member ?</h5>
		
		 <div class="form-group">
            <label for="refferal-id" class="control-label">Referral Id:</label>
            <input type="text" class="form-control" id="refferal-id" placeholder="Enter Referral Id">
          </div>
		  <button class="btn btn-primary login" id="reflogin">PROCEED</button>
			<div class="col-xs-12 col-sm-12 col-md-12 or">
			<div class="or1">
			or
			</div>
			</div>-->
			
			<h5>Login</h5>
			<p class="error-msg" id="loginerror"></p>
			 <div class="form-group">
            <label for="username" class="control-label">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Username">
          </div>
		   <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="*******">
          </div>
		  <button  class="btn btn-danger login1" id="login">Login</button>
		  
		  </a>
		  </div>
		  </div>
	   </div>
      </div>
     
    </div>
  </div>
</div>


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
  $('#products').owlCarousel({
	items : 1,
	loop:true,
	nav:false,
	autoplay:true,
	dots:true,
	autoplayTimeout:2000,
	autoplayHoverPause:true
  })
})

	wow = new WOW({boxClass:'wow',animateClass: 'animated',offset: 0});
    new WOW().init();
</script>

		<script>
$(document).ready(function()
{
	var baseurl=getUrl();
	$("#pronum").on("keydown",function(evt)
		    {
	    		
		    	        var charCode = (evt.which) ? evt.which : event.keyCode
		    	        	
		    	       if((charCode >= 48 && charCode <= 57) || (charCode >= 96 && charCode <= 105)||(charCode==8))	
		    	       {	
		    	        
			    	         return true;
		    	        	
		    	        }
		    	      
		    	        else
		    	        {

		    	        	 return false;
		    	        }
	 					 
					
						  
		    });
	/*$("#pronum").click(function()
	{

	});*/
	$("#buynow").click(function()
	{
		$("#referror").text("");
		$("#referrors").text("");
		$("#username").val("");
		$("#password").val("");
        var qtys=$("#proqtys").attr('value');
		
		if((qtys>0))
		{
			var num=$("#pronum").val();
			var size=$("#prosize").val();
            //alert(num+"--"+size);
			if(num=="")
			{
				$("#referrors").text("Please Select Qty");
			}
			else if((isNaN(num))||(num<=0))
			{
				$("#referrors").text("Invalid Qty");
			}
			else if(num>qtys)
			{
				$("#referrors").text("Insufficient Qty");
			}
			/*else if(size=="Select"||size=="")
			{
				$("#referrors").text("Please Select Size");
			}*/
			else
			{
				
				if($(this).val()==0)
				{
					$("#buynowlogin").click();
				}
				else
				{
					window.location.href=baseurl+"welcome/delivery_details?type=2&num="+num+"&s="+size+"&pd=<?php echo $pid;?>";
				}
			}
       }
       else
       {
             alert("Product Out Of Stock");
       }
	});
	
	$("#login").click(function()
	{
		$("#referror").text("");
	var uname=$("#username").val();
	var pwd=$("#password").val();
	var num=$("#pronum").val();
	var size=$("#prosize").val();
	$("#referrors").text("");
	if(uname=="")
	{
		$("#referror").text("Please Enter Username");
	}
	else if(pwd=="")
	{
		$("#referror").text("Please Enter Password");
	}
	else{
		//alert(baseurl+"welcome/getlogin?user="+uname+"&pwd="+pwd);
		document.getElementById("login").disabled = true;
		//document.getElementById("reflogin").disabled = true;
		$.ajax({
		    type: "POST",
		    url: baseurl+"welcome/getlogin",		 
		    dataType: "json",
		    data:{"user":uname,"pwd":pwd},
		    success: function(jsn) 
		    {
				//alert(jsn);
				if(jsn[0].res==0||jsn[0].type=='W')
				{
					$("#referror").text("Incorrect Username/password");
					document.getElementById("login").disabled = false;
					//document.getElementById("reflogin").disabled = false;
				}
				else{
					//window.location.href=baseurl+"welcome/delivery_details?type=2&pd=<?php //echo $pid;?>";
					window.location.href=baseurl+"welcome/delivery_details?type=2&num="+num+"&s="+size+"&pd=<?php echo $pid;?>";
					
				}
		     }
			 });
		}
	});


/*$("#reflogin").click(function()
		{
			$("#referror").text("");
			var refid=$("#refferal-id").val();
	
			if(refid=="")
			{
				$("#referror").text("Please Enter Referral Id");
			}
		else{
			//alert(baseurl+"welcome/getreflogin?refid="+refid);
				document.getElementById("login").disabled = true;
				document.getElementById("reflogin").disabled = true;
				$.ajax({
				    type: "POST",
				    url: baseurl+"welcome/getreflogin",		 
				    dataType: "json",
				    data:{"refid":refid},
				    success: function(jsn) 
				    {
						//alert(jsn);
						if(jsn.length==0)
						{
							$("#referror").text("Incorrect Referral Id");
							document.getElementById("login").disabled = false;
							document.getElementById("reflogin").disabled = false;
						}
						else{
							window.location.href=baseurl+"welcome/delivery_details?type=2&pd=<?php echo $pid;?>&refid="+refid;
						}
				     }
					 });
				}
			});*/
		});

</script>		 


</body>
</html>
