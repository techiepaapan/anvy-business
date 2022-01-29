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
<link href="<?php echo base_url();?>css/style-new.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>css/login.css" rel='stylesheet' type='text/css' />
<!-- //gallery -->


<!-- js -->
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- //js -->
<script type="text/javascript" src="<?php echo base_url();?>js/modernizr-2.6.2.min.js"></script>


<!-- //Script-for-nav-scrolling -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="inner"> 
		
		<!--login_logo starts-->
		<div class="login_logo" style="padding-top: 30px;"><a href="<?php echo base_url();?>"><h1>Anvy Business</h1></a></div>
		<!--login logo ends--> 
		
		<!--login_box starts-->
		<div class="login_box">
				<div class="login-top"><p class="error-msg" id="referror" style="color: red;height: 20px;"></p></div>
				<div class="login-cnt">
						<form  id="loginform">
								<fieldset>
										<p>
											<label>Username</label>
											<input id="user" name="user" placeholder="Username" class="text-bx">
										</p>
										<p>
											<label>Password</label>
											<input name="password" id="password" type="password" placeholder="********"  class="text-bx">
										</p>
										<p>
											<input class="login_submit" id="submit" value="Login »" type="button">
										</p>
								</fieldset>
						</form>
						
				</div>
				<div class="login_boxbottom"></div>
		</div>
		<!--login_box ends--> 
		
		<!--do not remove this clear-->
		<div class="clear"></div>
		<!--link to home page-->
		<div class="login_homelink"><a href="http://www.anvybusiness.com">Back to Anvy Business Services</a></div>
</div>	

<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>js/Ajax/url.js"></script>
<!-- //for bootstrap working -->
<script>
$(document).ready(function()
{
	var baseurl=getUrl();
	$("#submit").click(function()
			{
				var user=$("#user").val();
				var pwd=$("#password").val();
				//alert(baseurl+"welcome/getlogin?user="+user+"&pwd="+pwd);
				$.getJSON(baseurl+"welcome/getlogin?user="+user+"&pwd="+pwd,function(jsn)
				{
					$("#referror").text("");
					if(jsn[0].res==0)
					{
						$("#referror").text("Invalid Username/Password");
						$("#user").val("");
						$("#password").val("");
					}
					else
					{
						//alert(jsn[0].pin+" - "+jsn[0].uid);
						window.location.href=baseurl;
					}
				});
			});
});

</script>
</body>
</html>
