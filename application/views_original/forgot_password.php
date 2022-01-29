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
<link href="<?php echo base_url();?>css/alertify.core.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/alertify.default.css" rel="stylesheet" type="text/css" /> 
<!-- //gallery -->


<!-- js -->
	<script src="<?php echo base_url();?>js/jquery.min.js"></script>
	 
<script type="text/javascript" src="<?php echo base_url();?>js/alertify.js"></script>
<!-- //js -->
<script type="text/javascript" src="<?php echo base_url();?>js/modernizr-2.6.2.min.js"></script>


   
    
   <style>
   .login_submi {
    width: 100%;
    margin-top: 12px;
    margin-bottom: 10px;
    background-color: rgb(70, 147, 156);
    color: #fefefe;
    font-size: 15px;
    padding: 7px 10px;
    border: solid 1px rgb(27, 189, 232);
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
    </style>
    
    
</head>
<body>
<div id="inner"> 
		
		<!--login_logo starts-->
		<div class="login_logo" style="padding-top: 30px;"><a href="<?php echo base_url();?>"><h1>ANVY BUSINESS</h1></a></div>
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
											<label>Phone</label>
											<input name="mobile" id="mobile" type="text" placeholder="Mobile"  class="text-bx">
										</p>
										<p>
											<input class="login_submi" id="submit" value="Submit »" type="button">
										</p>
										<p>
									  <input type="text" id="send" style="text-align: center;width:100%;display:none;color:green;border:none;background:none;pointer-events:none;" value="Sending Message..."/>
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
		<div class="login_homelink"><a href="<?php echo base_url();?>">Back to ANVY BUSINESS</a></div>
</div>	

<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>js/Ajax/url.js"></script>
<!-- //for bootstrap working -->
<script>
$(document).ready(function()
{
	var baseurl="<?php echo base_url();?>";
	//alert(baseurl);
	$("#submit").click(function()
	{
		var user=$("#user").val();
		var mob=$("#mobile").val();
		var phoneformat=/^\d{10}$/;	
		$("#referror").text("");
		if(user==""||mob=="")
		{
			$("#referror").text("Fill all Fields");
		}
		else if (phoneformat.test(mob) == false)
		{
			$("#referror").text("Invalid Phone Format");
		}
		else
		{     document.getElementById("submit").disabled = true;
			//alert(baseurl+"welcome/getpassword?user="+user+"&mob="+mob);
			  $.getJSON(baseurl+"welcome/getpassword?user="+user+"&mob="+mob,function(jsn)
					{
						$("#referror").text("");
						if(jsn[0].res==0)
						{
							$("#referror").text("Invalid Username");
							$("#user").val("");
							$("#email").val("");
							document.getElementById("submit").disabled = true;
						}
						else if(jsn[0].res==1)
						{
							$("#referror").text("Invalid Phone");
							$("#user").val("");
							$("#email").val("");
							document.getElementById("submit").disabled = true;
						}
						else
						{
							document.getElementById("send").style.display = "block";
							var pass=jsn[0].pass;
							var name=jsn[0].name;
							//alert(name);
							//alert(baseurl+"welcome/sendSMS?pass="+pass+"&mob="+mob+"&user="+user+"&name="+name);
							$.getJSON(baseurl+"welcome/sendSMS?pass="+pass+"&mob="+mob+"&user="+user+"&name="+name,function(jsn)
							{
								if(jsn[0].stat==1)
								{
									alertify.success("Message Has Been Sent");
									setTimeout(function() {
										document.getElementById("send").style.display = "none";
										document.getElementById("submit").disabled = false;
										window.location.href=baseurl+"welcome/login";
									}, 1500);
								}
								else
								{

									alertify.error("Message Sending Failed");
									setTimeout(function() {
										document.getElementById("send").style.display = "none";
										document.getElementById("submit").disabled = false;
									}, 1500);
								}

							});
						}
					});
  
		}
	});
});
</script>
</body>
</html>