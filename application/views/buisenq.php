				
					
					
					
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
							
							<li><i class="fa fa-phone" aria-hidden="true"></i>+919446555678 </li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i> support@anvybusiness.com</li>
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
						<div class="col-xs-12">
							<span id="bestaterr" style="color: #ff5858;"></span>
							<span id="bestatsuc" style="color: #00c800;"></span>
						</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Name" id="bename">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Email" id="beemail">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Phone Number" id="bephone">
							</div>
							<div class="col-xs-6">
								<input type="text" class="form-control" placeholder="Place" id="beplace">
							</div>
							<div class="col-xs-12">
								<button type="button" class="btn btn-block btn-default besubmit">Submit</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	<script>
	$(document).ready(function()
	{
		var baseurl1=getUrl();
		$(".besubmit").click(function()
		{
			var bename=$("#bename").val();
			var beemail=$("#beemail").val();
			var bephone=$("#bephone").val();
			var beplace=$("#beplace").val();

			$("#bestaterr").html("");
			$("#bestatsuc").html("");
			
			if(bename=="")
			{
				$("#bestaterr").html("Please Enter Name");
			}
			else if(bephone=='')
			{
				$("#bestaterr").html("Please Enter Phone");
			}
			else if(beplace=='')
			{
				$("#bestaterr").html("Please Enter Place");
			}
			else{
				$("#bestaterr").html("");
				$("#bestatsuc").html("");
				//alert(baseurl1+"welcome/sendEnquiry?bename="+bename+"&beemail="+beemail+"&bephone="+bephone+"&beplace="+beplace);
				$.ajax({
				    type: "POST",
				    url: baseurl1+"welcome/sendEnquiry",		 
				    dataType: "json",
				    data:{"bename":bename,"beemail":beemail,"bephone":bephone,"beplace":beplace},
				    async:false,
				    success: function(jsn) 
				    {
					    if(jsn[0].res==1)
					    {
					    	$("#bestatsuc").html("Enquiry Submitted");
					    	$("#bename").val("");
							$("#beemail").val("");
							$("#bephone").val("");
							$("#beplace").val("");
					    }
					    else
						{
					    	$("#bestaterr").html("Error! Something went wrong");
					    }
				    }
		 		 });
			}
		});
		
	});
	</script>
