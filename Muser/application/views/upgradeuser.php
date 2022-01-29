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
			<li class="dropdown active">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-handshake-o" aria-hidden="true"></i> My Business</a>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url();?>welcome/teamView"><i class="fa fa-users" aria-hidden="true"></i> Team View</a></li>
				<li><a href="<?php echo base_url();?>welcome/directMembers"><i class="fa fa-user" aria-hidden="true"></i> Direct Members</a></li>
				<li><a href="<?php echo base_url();?>welcome/downlineList"><i class="fa fa-sitemap" aria-hidden="true"></i> Downline List</a></li>
				<li><a href="<?php echo base_url();?>welcome/upgradeuser"><i class="fa fa-sitemap" aria-hidden="true"></i> Upgrade</a></li>
			  </ul>
			</li>
			<li class="dropdown">
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
        	<h2>Upgrade User</h2>
        </div>
       
		<?php 
		$id= $_SESSION['uid1'];
		$this->load->database();
		$query = $this->db->query("select sum(upp.qty*pd.bv) as totalbv from user_product_prefer upp, product_details pd where pd.product_id=upp.product_id and upp.u_id='$id' group by upp.u_id;");
		$currentbv=0;
		foreach ($query->result() as $row)
		{
			$currentbv=$row->totalbv;
		}
		?>
		
        <div class="col-xs-12 col-sm-12 forms frms-new">
					  <div class="col-xs-12 col-sm-12 clear_third" style="height:320px;white-space: nowrap;overflow:auto">
			<?php 
			$this->load->database();
			$query = $this->db->query("select * from product_details  where active='1' order by bv desc;");
			$parentid="";
			foreach ($query->result() as $row)
			{
				
				 ?>
				 <div class="col-xs-12 col-sm-2" style="padding:3px;display: block;">
				 <div class="col-xs-12 col-sm-12" style="border:1px solid #5f5f5f;padding: 5px;">
					 <div class="col-xs-12 col-sm-12">
					 	<img style="width: 100%;" src="../../Madmin/uploads/<?php echo $row->image;?>">
					 </div>
					 <div class="col-xs-12 col-sm-12" style="padding: 0;">
					 	<p style="margin:0;overflow:hidden;" title="<?php echo $row->product_code; ?>"><?php echo $row->product_code; ?></p>
					 	<p style="margin:0;overflow:hidden;">Rs <?php echo $row->product_price; ?></p>
					 	<p style="margin:0;overflow:hidden;">BV: <?php echo $row->bv; ?></p>
					 	<p style="margin:0;"><button class="btn prdbtnsel" style="width:100%;" value="<?php echo $row->product_id;?>">Select</button></p>
					 </div>
					 </div>
				 </div>
				 <?php
				
			}
			?>
		</div>
		
		 <div class="col-xs-12 col-sm-12" style="margin-top: 5px;">
		 	
		 	<p style="margin: 0;">Total Price: Rs <span class="ptp">0</span></p>
		 	<p style="margin: 0;">Total BV: <span class="pbv">0</span></p>
			 <p style="margin: 0;">Delivery Charge: Rs <span class="pdc">0</span></p>
			 
			 <p>Product(s) Ordered Earlier: <span><?php echo  $currentbv;?>BV</span></p>
		
		 	<p><button class="btn btn-success" id="submitt">Submit</button></p>
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
        <script src="<?php echo base_url();?>js/alertify.js"></script>
    <script src="<?php echo base_url();?>js/Ajax/url.js"></script>
     <script src="<?php echo base_url();?>js/Ajax/upgradeuser.js?n=<?php echo rand(10,1000);?>"></script>
   
   	<script type="text/javascript">
		var currentbv=<?php echo $currentbv;?>;
		if(isNaN(currentbv)){
			currentbv=0;
		}
		else{
			currentbv=parseFloat(currentbv);
		}
   	</script>
  </body>
</html>