<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0  user-scalable=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/alertify.default.css" />
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" />
   
  </head>
  <body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding outer-box">
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
		  <a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"> </i> Profile</a>
			  <ul class="dropdown-menu">
				<li><a href="profile.html"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
				<li><a href="change-password.html"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check-square-o " aria-hidden="true"></i> Accounts</a>
			  <ul class="dropdown-menu">
				<li><a href="ewallet.html"><i class="fa fa-credit-card" aria-hidden="true"></i> Ewallet</a></li>
			  </ul>
			</li>
			<li><a href="#"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
        <div class="row">
        	<h2>LOGIN</h2>
        </div>
        <div class="form-horizontal">
		<div class="form-group">
				<label for="username" class="col-sm-4 control-label">Username</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="username" >
				</div>
			  </div>
			  <div class="form-group">
				<label for="password" class="col-sm-4 control-label">Password</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="password" >
				</div>
			  </div>
			   <div class="form-group text-center">
				 <button type="submit" class="btn btn-primary" id="submitt">Login</button>
			  </div>
			  </div>
			  </div>
		
        
        </div>
       
    </div>
    <div class="col-xs-12 col-sm-12 footer no-padding">
    	<div class="container">
       	 Copyright &copy; 2017 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a>
        </div>
    </div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/alertify.js"></script>
      <script type="text/javascript">
     $(document).ready(function()
     {
		var base_url="<?php echo base_url();?>";
		//alert(base_url);
		$("#submitt").click(function()
		{
				var user=$("#username").val();
				var pass=$("#password").val();
				if(user=="" || pass=="")
				{
					alertify.error("Fill all fields");
				}	
				else
				{
					//alert(base_url+"welcome/log_action?user="+user+"&pass="+pass);
					 $.ajax({
						    type: "POST",
						    url: base_url+"welcome/log_action",		
						    data:{"user":user,"pass":pass}, 
						    dataType: "json",			   
						    success: function(json) {
						    								
								if(json[0].res==0)
								{
									alertify.error("Enter valid username and password");
									setTimeout(function() {
										location.reload();
									}, 1500);
								}
								else
								{
									window.location.href=base_url+"welcome/home";
									
								}

							},async:false
							}); 
					
				}
		});
     });
    </script>
  </body>
</html>