<?php 
error_reporting(0);
include 'sessioncheck.php';

$pid=$_SESSION['uid1'];
//echo $pid;
$this->load->database();
$query=$this->db->query("select * from user_wallet where u_id='$pid'");
$balance=0;
if($query->num_rows()>0)
{
	foreach ($query->result() as $row)
	{
		$balance=$row->balance;

	}
}

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
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="<?php echo base_url();?>css/alertify.core.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/alertify.default.css" />
	 <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
	       <script src="<?php echo base_url();?>js/alertify.js"></script>
	       	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" />
	       	<link rel="stylesheet" href="<?php  echo base_url();?>css/datepicker.css" />
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    
    
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/url.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Ajax/Ewallet.js"></script>
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
		 		  <a class="navbar-brand" style="font-weight: 700;color: #fff;font-size: 25px;" href="<?php echo base_url();?>">
		  <img src="<?php echo base_url();?>/images/logo.png" style="width: 64px;height: auto; position: relative; top: -10px; float: left;margin-right: 12px;display: block;">
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
			<li class="dropdown active">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check-square-o " aria-hidden="true"></i> Accounts</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/ewallet"><i class="fa fa-credit-card" aria-hidden="true"></i> Ewallet</a></li>
<li><a href="<?php echo base_url();?>welcome/upgradeuser"><i class="fa fa-sitemap" aria-hidden="true"></i> Upgrade</a></li>
			  </ul>
			</li>
			<li><a href="<?php echo base_url();?>welcome/activate"><i class="fa  fa-user-plus" aria-hidden="true"></i>  Activate User</a></li>
			
			<li><a href="<?php echo base_url();?>welcome/logout"><i class="fa  fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="col-xs-12 col-sm-12 main-body">
    	<div class="container">
        <div class="row">
        	<h2>Ewallet</h2>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 ewallet-datepicking">
            	<div class="col-xs-6 col-sm-4 col-md-4 da"><input type="text" class="date-picker form-control input-md" placeholder="From" id="from">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 da"><input type="text" class="date-picker form-control input-md" placeholder="To" id="to">
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 da"><input type="button" id="srch" class="btn btn-info srch" value="Search">
                </div>
            </div>
	
			<div class="col-xs-12 col-sm-12 col-md-12 current">
				Current Balance : <span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $balance;?></span>
			</div>
			
			<!-- 
	       <div class="col-md-12">
            	<div class="col-md-4 da"><input type="text" class="date-picker form-control input-md" placeholder="From">
                </div>
                <div class="col-md-4 da"><input type="text" class="date-picker form-control input-md" placeholder="To">
                </div>
                <div class="col-md-3 da"><input type="button" class="btn btn-info srch" value="Search">
                </div>
            </div>
			<div class="col-md-12 current">
				Current Balance : <span id="valletprice">INR.0.00</span>
			</div> -->
		
        <div class="col-xs-12 col-sm-12 forms">
			<div class="table-responsive">
			<table class="table table-bordered" id="tbx"> 
				<thead> 
					<tr> 
						<th>Date</th> 
						<th>Type</th> 
						<th>Details</th> 
						<th>Amount</th> 
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
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">EWALLET</h4>
		  </div>
		  <div class="modal-body">
			<div class="form-horizontal">
			  <div class="form-group">
				<label for="amount" class="col-sm-4 control-label">Amount</label>
				<div class="col-sm-8 cls amt">
				 <!-- <input type="text" class="form-control" id="amount" >-->
				</div>
			  </div>
			 <div class="form-group">
				<label for="service_charge" class="col-sm-4 control-label">Service Charge</label>
				<div class="col-sm-8 cls sv">
				<!--  <input type="text" class="form-control" id="service_charge" >-->
				</div>
			  </div>
			  <div class="form-group">
				<label for="service_charge" class="col-sm-4 control-label">Free-User Charge</label>
				<div class="col-sm-8 cls fuc">
				<!--  <input type="text" class="form-control" id="service_charge" >-->
				</div>
			  </div>
			  <div class="form-group">
				<label for="total_amount" class="col-sm-4 control-label">Total Amount</label>
				<div class="col-sm-8 cls tamt">
				 <!-- <input type="text" class="form-control" id="total_amount" >-->
				</div>
			  </div>
			  <div class="form-group">
				<label for="net_status" class="col-sm-4 control-label">Net Status</label>
				<div class="col-sm-8 cls">Success
				<!--  <input type="text" class="form-control" id="net_status" >-->
				</div>
			  </div>
		
			 
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
	
	
     <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
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
   
  </body>
</html>
