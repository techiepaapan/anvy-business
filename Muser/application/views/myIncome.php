<?php 
include 'sessioncheck.php';
//echo $id."<br>".$pin;
?>
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
    	<link rel="stylesheet" href="<?php  echo base_url();?>css/datepicker.css" />
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
		  		  <a class="navbar-brand" href="<?php echo base_url();?>">
		  <img src="<?php echo base_url();?>/images/logo.png">
		  ANVY BUSINESS</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 <ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url();?>welcome/home"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"> </i> Profile</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/profile"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
				<li><a href="<?php echo base_url();?>welcome/changepassword"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-handshake-o" aria-hidden="true"></i> My Business</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/teamView"><i class="fa fa-users" aria-hidden="true"></i> Team View</a></li>
				<li><a href="<?php echo base_url();?>welcome/directMembers"><i class="fa fa-user" aria-hidden="true"></i> Direct Members</a></li>
				<li><a href="<?php echo base_url();?>welcome/downlineList"><i class="fa fa-sitemap" aria-hidden="true"></i> Downline List</a></li>
<li><a href="<?php echo base_url();?>welcome/upgradeuser"><i class="fa fa-sitemap" aria-hidden="true"></i> Upgrade</a></li>
			  </ul>
			</li>
			<li class="dropdown active">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check-square-o " aria-hidden="true"></i> Accounts</a>
			  <ul class="dropdown-menu">
				<!--<li><a href="<?php echo base_url();?>welcome/ewallet"><i class="fa fa-credit-card" aria-hidden="true"></i> Ewallet</a></li>-->
				<li><a href="<?php echo base_url();?>welcome/directSalesIncentive"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Direct Sales Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/teamSalesIncentive"><i class="fa fa-users" aria-hidden="true"></i> Team Sales Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/leadersSuccessIncentive"><i class="fa fa-user" aria-hidden="true"></i> Leaders Success Incentive</a></li>
				<li><a href="<?php echo base_url();?>welcome/myIncome"><i class="fa fa-credit-card" aria-hidden="true"></i> My Income</a></li>
			  </ul>
			</li>
			<li><a href="<?php echo base_url();?>welcome/support"><i class="fa  fa-question-circle" aria-hidden="true"></i> Support</a></li>
			<li><a href="<?php echo base_url();?>welcome/businessTools"><i class="fa  fa-wrench" aria-hidden="true"></i> Business Tools</a></li>
			<!--<li><a href="<?php echo base_url();?>welcome/activate"><i class="fa  fa-user-plus" aria-hidden="true"></i>  Activate User</a></li>-->
			
			<li><a href="<?php echo base_url();?>welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>


   
  	 
	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
        <div class="row">
        	<h2>My Income</h2>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 ewallet-datepicking">
            	<div class="col-xs-6 col-sm-4 col-md-4 da"><input type="text" class="date-picker form-control input-md" placeholder="From" id="from">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 da"><input type="text" class="date-picker form-control input-md" placeholder="To" id="to">
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 da"><input type="button" id="srch" class="btn btn-info srch" value="Search">
                </div>
            </div>
	
		
        <div class="col-xs-12 col-sm-12 forms">
			<p><span style="color:red;">**</span> : 5% TDS And 5% Admin Expense</p>
			<div class="table-responsive">
			<table class="table table-bordered" id="tbx"> 
				<thead> 
					<tr> 
						<th>No</th> 
						<th>Date</th> 
						<th>D S I</th> 
						<th>T S I</th> 
						<th>L S I</th> 
						<th>Gross Amount</th> 
						<th>Processing<span style="color:red;">**</span></th> 
						<!-- <th>T D S</th> --> 
						<th>Cheque Amount</th> 
						
					</tr> 
				</thead> 
				<tbody id="walappend"> 

				</tbody> 
			</table>
			</div>
        </div>
        </div>
       
    </div>

    <div class="col-xs-12 col-sm-12 footer no-padding">
    	<div class="container">
       	 Copyright &copy; 2018 Anvy Business Services(OPC) Pvt Ltd. All Rights Reserved | Design by <a href="http://www.adhoctechnologies.org/" target="_blank">Adhoc Technologies Pvt Ltd.</a>
        </div>
    </div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url();?>js/Ajax/url.js"></script>
   <script>
      	$(".date-picker").datepicker();

		$(".date-picker").on("change", function () 
		{
			var id = $(this).attr("id");
			var val = $("label[for='" + id + "']").text();
			$("#msg").text(val + " changed");
			$(".datepicker").hide();
		});
		
      </script>




		
    	<script>
	$(document).ready(function()
			{
				var base_url=getUrl();
				var from="0000-00-00";
				
				function currentDate(){
					// GET YYYY, MM AND DD FROM THE DATE OBJECT
					var date = new Date();
					var yyyy = date.getFullYear().toString();
					var mm = (date.getMonth()+1).toString();
					var dd  = date.getDate().toString();
					 
					// CONVERT mm AND dd INTO chars
					var mmChars = mm.split('');
					var ddChars = dd.split('');
					// CONCAT THE STRINGS IN YYYY-MM-DD FORMAT
					var tox=yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
					return tox;
					}

				
				var to = currentDate();
				
				getdata(base_url,from,to);
				
				$("#srch").click(function(){
					var from=$("#from").val();
					var to=$("#to").val();
					if(from=="" || to=="")
					{
						from="0000-00-00";
						to = currentDate();
					}
					else{
						from=from.split("/").reverse().join("-");
						to=to.split("/").reverse().join("-");
					}
					getdata(base_url,from,to);
				});
			});


	function getdata(base_url,from,to){

		$("#walappend").html("");
		//alert(base_url+"welcome/getMI?from="+from+"&to="+to);
		$.ajax({
			 url: base_url+"welcome/getMI", // point to server-side controller method
			 dataType: 'json', // what to expect back from the server
			 data:{"from":from,"to":to},
			 type: 'post',
			 async:false,
		     success: function (jsn) {
		    		$("#walappend").html("");

		    		for(var i=0;i<jsn.length;++i){

		    			var payout_date=jsn[i].payout_date;
		    			var service_charge=jsn[i].service_charge;
		    			var amount=jsn[i].amount;
		    			var lsi=jsn[i].lsi;
		    			var dsi=jsn[i].dsi;
		    			var tsi=jsn[i].tsi;
		    			if(isNaN(lsi) || lsi==null|| lsi==''){lsi=0;}
		    			if(isNaN(dsi) || dsi==null|| dsi==''){dsi=0;}
		    			if(isNaN(tsi) || tsi==null|| tsi==''){tsi=0;}
		    			var gross=parseFloat(lsi)+parseFloat(dsi)+parseFloat(tsi);

		    			lsi=parseFloat(lsi).toFixed(2);
		    			dsi=parseFloat(dsi).toFixed(2);
		    			tsi=parseFloat(tsi).toFixed(2);
		    			gross=parseFloat(gross).toFixed(2);
		    			service_charge=parseFloat(service_charge).toFixed(2);
		    			amount=parseFloat(amount).toFixed(2);
		    			
			    		$("#walappend").append('<tr>'+
			    				'<td>'+(i+1)+'</td>'+
			    				'<td>'+payout_date+'</td>'+
			    				'<td><i class="fa fa-inr" aria-hidden="true"></i> '+dsi+'</td>'+
			    				'<td><i class="fa fa-inr" aria-hidden="true"></i> '+tsi+'</td>'+
			    				'<td><i class="fa fa-inr" aria-hidden="true"></i> '+lsi+'</td>'+
			    				'<td><i class="fa fa-inr" aria-hidden="true"></i> '+gross+'</td>'+
			    				'<td><i class="fa fa-inr" aria-hidden="true"></i> '+service_charge+'</td>'+
			    				'<td><i class="fa fa-inr" aria-hidden="true"></i> '+amount+'</td>'+
			    				'</tr>'
			    		);
		    		}	
		     }
		 });
		
	}
					
    </script>

		
    </script>
  </body>
</html>